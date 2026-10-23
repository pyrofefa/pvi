<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Check whether the site is offline or not.
 *
 */
class maintenance {
  var $CI;

    public function __construct()
    {
    log_message('debug','Accessing site_offline hook!');
    }
    
    public function is_offline()
    {
    if(file_exists(APPPATH.'config/config_maintenance.php'))
    {
        include(APPPATH.'config/config_maintenance.php');
        
        if(isset($config['maintenance']) && $config['maintenance']===TRUE)
        {
        $this->show_site_offline();
        exit;
        }
    }
    }

    private function show_site_offline()
    {

    echo '<html><body>
    <center>
        El sitio se encuentra en mantenimiento.<br />
        <span style="color:#999;font-weight:bold;">No es necesario reportar este inconveniente</span><br /><br /><br />
                   ------------------<br /><br />
        This site is temporarily unavailable.<br />
        <span style="color:#999;font-weight:bold;">Report it is not necessary </span><br /><br /><br /><br />



        </center></body></html>';
    }

}
/* Location: ./system/application/hooks/site_offline_hook.php */