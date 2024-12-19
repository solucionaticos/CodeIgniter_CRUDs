<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Solucionáticos. Ingreso</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .error {
      color: red;
    }
    #img_captcha {
      display: inline; 
    }
    #refresh_captcha {
      float: right;
    }
    .captcha_barra {
      background-color: #c8c8c8;
    }
  </style>

</head>
<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">
    <a href="<?= base_url() ?>sistema"><b><?=$this->lang->line('be_project_s_name')?></b></a>
  </div>

  <div class="login-box-body">
<?php
if ( $this->session->flashdata('alertaMensaje') ) {
?>
<div class="alert alert-<?php echo $this->session->flashdata('alertaTipo'); ?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $this->session->flashdata('alertaMensaje'); ?>
</div>
<?php
}
?>

    <p class="login-box-msg"><?=$this->lang->line('be_sign_in_to_start_your_session')?></p>

<?php
$atributos = array('id' => 'forma_ingreso_validacion', 'autocomplete' => 'kilo');
echo form_open('sistema/ingreso_validacion', $atributos);
?>

      <input type="hidden" name="sistema_id" id="sistema_id" value="<?php echo $sistema_id; ?>">
      <input type="hidden" name="csrf" id="csrf" value="<?php echo $csrf; ?>">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="<?=$this->lang->line('be_type_your_email')?>" id="email" name="email" autocomplete="kilo">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="<?=$this->lang->line('be_type_your_password')?>" id="password" name="password" autocomplete="kilo">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <label>Verificación de que no eres un robot:<br></label>
          <div class="captcha_barra">
            <img src="<?php echo base_url(); ?>sistema/captcha" alt="CAPTCHA" class="img-responsive" id="img_captcha">
            <button type="button" class="btn btn-default btn-sm text-aqua" id="refresh_captcha">
              <span class="glyphicon glyphicon-refresh"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="ingresa el texto de la imagen" id="captcha_challenge" name="captcha_challenge" autocomplete="kilo">
        <span class="glyphicon glyphicon-text-background form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-7 recuerdame">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="recuerdame" id="recuerdame"> Recuerdame
            </label>
          </div>
        </div>
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?=$this->lang->line('be_sign_in')?></button>
        </div>
      </div>

      <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12">
          <a href="<?= base_url() ?>sistema/olvido" class="enlace"><?=$this->lang->line('be_i_forgot_my_password')?></a><br>
          <a href="<?= base_url() ?>sistema/registro" class="enlace"><?=$this->lang->line('be_register_a_new_membership')?></a>
        </div>
      </div>

    </form>

    <div class="social-auth-links text-center">
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingreso con Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Ingreso con Google</a>
    </div>

  </div>
  
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<?php echo $proyVar;?>
<?php echo $txtVar;?>

<script src="<?= base_url() ?>assets/plugins/jquery.validate/jquery.validate.min.js"></script>

<script type="text/javascript">

$(function () {

      // Borrado de campos para Chrome
      setTimeout(function(){ 
        $("#email").val("");
        $("#password").val("");
        $("#captcha_challenge").val("");
      }, 1000);

      $("#refresh_captcha").click(function () {
        $("#img_captcha").attr("src", proyVar.base_url + "sistema/captcha");
      });

      $("input[name=email]").focus();

      $( "#forma_ingreso_validacion" ).validate( {
        rules: {
          email: {
            required: true,
            email: true,
            minlength: 6,
            maxlength: 70  
          },
          password: {
            required: true,
            minlength: 7,
            maxlength: 20
          },
          captcha_challenge: {
            required: true,
            maxlength: 6, 
            minlength: 6  
          },
        },
        messages: {
          email: {
            required: txtVar.be_the_email_field_is_required,
            email: txtVar.be_your_email_must_be_in_the_format_name_domain_com,
            minlength: txtVar.be_your_email_must_have_at_least_6_characters,
            maxlength: txtVar.be_your_email_must_have_a_maximum_of_70_characters
          },
          password: {
            required: txtVar.be_the_password_field_is_required,
            minlength: txtVar.be_your_password_must_have_at_least_7_characters,
            maxlength: txtVar.be_your_password_must_have_a_maximum_of_20_characters
          },
          captcha_challenge: {
            required: txtVar.be_the_image_text_field_is_required,
            maxlength: txtVar.be_the_image_text_must_have_a_maximum_of_6_characters,
            minlength: txtVar.be_the_image_text_must_have_a_minimum_of_6_characters
          },
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          error.addClass( "help-block" );
          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );

});

</script>

</body>
</html>