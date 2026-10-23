<script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery.js"></script>
<script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery-ui.min.js"></script>
<!-- keyboard widget css & script (required) -->
<link href="<?php echo assets_url(); ?>plugins/keyboard/css/keyboard.css" rel="stylesheet">
<script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery.keyboard.js"></script>
<!-- keyboard extensions (optional) -->
<script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery.mousewheel.js"></script>
<script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery.keyboard.extension-typing.js"></script>
<script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery.keyboard.extension-autocomplete.js"></script>
<script>
$(document).ready(function(){
{
  alert("hola");
  //FUNCION PARA INICIAR EL TECLADO EN PANTALLA
  $('.qwerty').keyboard(
  {
    layout   : 'qwerty',
    lockInput: true // prevent manual keyboard entry
  });
  
  $('.qwerty:eq(1)').keyboard(
  {
    openOn   : null,
    stayOpen : true,
    lockInput: true,
    layout   : 'qwerty'
  });
  
  $('#password').click(function()
  {
    $('.qwerty:eq(1)').getkeyboard().reveal();
  });
});
</script> 
 <h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>