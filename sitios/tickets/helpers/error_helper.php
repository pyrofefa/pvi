<? if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Sensibly report of errors that occur in the system by sending that
* error to the developer
* Author: Matt Carter <m@ttcarter.com>
* Info: http://hash-bang.net/2009/02/error-reporting-with-cierror-reporting-with-ci/
*/
 
// Where to send the error report. Leave blank for nowhere
define('ERR_MAIL_TO', 'ivan.espinoza@cesaveson.com');
 
 // Literal name of that person
define('ERR_MAIL_TO_NAME', 'Simdia Tecnicos');
define('ERR_MAIL_FROM', 'errors@cesaveson.com');
define('ERR_MAIL_FROM_NAME', 'Error Daemon');
define('ERR_MAIL_METHOD', 'SMTP'); // Supported: SMTP
define('ERR_MAIL_HOST', 'localhost');
define('ERR_MAIL_SENDER', 'errors@cesaveson.com');
 
 // The subject of the mail. Supported tags: [TYPE], [FILE], [LINE], [STRING], [BASENAME]
define('ERR_MAIL_SUBJECT', 'Error detected: [TYPE] @ [BASENAME]:[LINE]');
 // Other things of interest to include in the email. CSV of supported values: POST, GET, SERVER, GLOBALS, SESSION
define('ERR_MAIL_FOOTERS', 'POST,GET,SESSION');
 
// Relative location of PHP mailer to this file
// (Not relative to the working directory because that doesn't specify correctly with fatal errors).
// By default this assumes that the 'phpMailer' folder is located in the same directory as this script.
define('ERR_PATH_PHPMAILER', '../libraries/PHPMailer/class.phpmailer.php');
 
function err($errno, $errstr, $errfile, $errline, $errcontext) {
	$errtable = array(
		1 => 'Fatal',
		2 => 'Warning',
		4 => 'Parse Error',
		8 => 'Notice',
		16 => 'Core Error',
		32 => 'Core Warning',
		64 => 'Compile Error',
		128 => 'Compile Warning',
		256 => 'User Error',
		512 => 'User Warning',
		1024 => 'User Notice',
		2048 => 'Strict Notice',
		4096 => 'Recoverable Error',
		8192 => 'Deprecated',
		16384 => 'User Deprecated',
	);
	$message = "<style>";
	$message .= ".err-box {border: 1px solid #4A98AF}";
	$message .= ".err-table th {background: #4A98AF; text-align: right; white-space: nowrap}";
	$message .= ".err-table td, .err-table th {padding: 5px}";
	$message .= ".err-table-stack th {background: #4A98AF; text-align: left}";
	$message .= ".err-table-stack th, .err-table-stack td {font-size: 12px}";
	$message .= "</style>";
	$message .= "<div class=\"err-box\">";
	$message .= "<table class=\"err-table\">";
	$message .= "<tr><th width=\"100px\">Type:</th><td>{$errtable[$errno]}</td></tr>";
	$message .= "<tr><th>Error:</th><td>$errstr</td></tr>";
	$message .= "<tr><th>File:</th><td>$errfile</td></tr>";
	$message .= "<tr><th>Line:</th><td>$errline</td></tr>";
	$message .= "<tr><th>Context:</th><td>$errcontext</td></tr>";
	$message .= "</table>";
	$traces = debug_backtrace();
	array_shift($traces);
	if ( (count($traces) > 1) && ($traces[0]['function'] != 'err_shutdown') ) { // Ignore fatal shutdown traces
		$message .= "<table width=\"100%\" class=\"err-table-stack\"><tr><th width=\"50px\">Line</th><th>Function</th>";
		foreach ($traces as $offset => $trace) {
			// Calculate line number
			if ($offset == 0) { // First in trace
				$message .= "<tr><td style=\"text-align: center\">$errline</td><td>";
			} else // Nth in trace
				$message .= "<tr><td style=\"text-align: center\">" . (isset($trace['line']) ? $trace['line'] : '&nbsp;') . "</td><td>";
			// Calculate arg stack
			$trace['argstack'] = '';
			if (isset($trace['args']) && $trace['args']) {
				foreach ($trace['args'] as $arg)
					$trace['argstack'] .= _err_human($arg) . ' , ';
				if ($trace['argstack']) $trace['argstack'] = substr($trace['argstack'], 0, -3);
			}
			// Output context
			if (isset($trace['object'])) { // Object error
				$message .= "{$trace['class']}->{$trace['function']}({$trace['argstack']})";
			} else // Function error
				$message .= "{$trace['function']}({$trace['argstack']})";
			$message .= "</td></tr>";
		}
		$message .= "</table>";
	}
	$message .= "</div>";
	if (ERR_MAIL_TO) {
		if (!file_exists($p = dirname(__FILE__) . '/' . ERR_PATH_PHPMAILER)) {
			echo "Cannot find PHP mailer at the relative path '" . ERR_PATH_PHPMAILER ."'. Make sure it is located there to send mails";
		} else {
			require_once($p);
			$mailobj = new PhpMailer();
			if (ERR_MAIL_METHOD == 'SMTP') $mailobj->IsSMTP();
			$mailobj->IsHTML(TRUE);
			$mailobj->CharSet = 'utf-8';
			$mailobj->Host = ERR_MAIL_HOST;
			$mailobj->Sender = ERR_MAIL_SENDER;
			$mailobj->From = ERR_MAIL_FROM;
			$mailobj->FromName = ERR_MAIL_FROM_NAME;
			$mailobj->AddAddress(ERR_MAIL_TO, ERR_MAIL_TO_NAME);
			$mailobj->Subject = strtr(ERR_MAIL_SUBJECT, array(
				'[TYPE]' => $errtable[$errno],
				'[FILE]' => $errfile,
				'[BASENAME]' => basename($errfile),
				'[LINE]' => $errline,
				'[STRING]' => $errstr,
			));
			$extras = preg_split('/\s*,\s*/', ERR_MAIL_FOOTERS);
			if (in_array('GET', $extras)) $message .= _err_dump_array($_GET, 'Get');
			if (in_array('POST', $extras)) $message .= _err_dump_array($_POST, 'Post');
			if (in_array('SESSION', $extras)) $message .= _err_dump_array(isset($_SESSION) ? $_SESSION : array(), 'Session');
			if (in_array('SERVER', $extras)) $message .= _err_dump_array($_SERVER, 'Server');
			if (in_array('GLOBALS', $extras)) $message .= _err_dump_array($_GLOBALS, 'Globals');
			$mailobj->Body = $message;
			$status = $mailobj->Send();
		}
	}
	echo $message;
	return TRUE;
}
 
// Catch fatal errors
function err_shutdown() {
	$err = error_get_last();
	if (in_array($err['type'], array(E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR)))
		err($err['type'], $err['message'], $err['file'], $err['line'], 'Fatal error');
}
 
function _err_human($what) {
	if (is_object($what)) {
		return get_class($what);
	} elseif (is_array($what)) {
		return "Array[" . count($what) . "]";
	} else
		return $what;
}
 
function _err_dump_array($array, $title) {
	if ($array) {
		$out = '<table class="err-table-stack">';
		$out .= "<tr><th colspan=\"2\">Dump of $title array</th></tr><tr><th>Key</th><th>Value</th></tr>";
		foreach (array_keys($array) as $key)
			$out .= "<tr><th>$key</th><td>" . _err_human($array[$key]) . "</td></tr>";
		$out .= '</table>';
	} else {
		$out = "<div>$title is empty</div>";
	}
	return $out;
}
set_error_handler('err', E_ALL);
register_shutdown_function('err_shutdown');
?>