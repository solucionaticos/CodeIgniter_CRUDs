<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Solucionáticos. Registro</title>
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
// Bloque de codigo para presentar mensajes de alerta
if ( $this->session->flashdata('alertaMensaje') ) {
?>
<div class="alert alert-<?php echo $this->session->flashdata('alertaTipo'); ?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $this->session->flashdata('alertaMensaje'); ?>
</div>
<?php
}
?>

    <p class="login-box-msg"><?=$this->lang->line('be_type_your_data_to_create_a_new_membership')?></p>

<?php
$atributos = array('id' => 'forma_validacion_registro', 'autocomplete' => 'kilo');
echo form_open('sistema/validacion_registro', $atributos);
?>

      <input type="hidden" name="sistema_id" id="sistema_id" value="<?php echo $sistema_id; ?>">
      <input type="hidden" name="csrf" id="csrf" value="<?php echo $csrf; ?>">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="<?=$this->lang->line('be_type_your_first_name')?>" name="nombre" id="nombre" autocomplete="kilo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="<?=$this->lang->line('be_type_your_last_names')?>" name="apellidos" id="apellidos" autocomplete="kilo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="<?=$this->lang->line('be_type_your_email')?>" name="email" id="email" autocomplete="kilo">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="<?=$this->lang->line('be_type_your_password')?>" name="password" id="password" autocomplete="kilo">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="<?=$this->lang->line('be_confirm_the_password')?>" name="clave_validacion" id="clave_validacion" autocomplete="kilo">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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

      <div class="form-group">
        <div class="col-xs-12">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="terminos" id="terminos">&nbsp;&nbsp;<?=$this->lang->line('be_i_accept_the_terms')?>
            </label>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?=$this->lang->line('be_create_account')?></button>
        </div>
      </div>   

      <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12">
          <a href="<?= base_url() ?>sistema/olvido" class="enlace"><?=$this->lang->line('be_i_forgot_my_password')?></a><br>
          Ver <a href="">Políticas de Privacidad</a> y <a href="">Términos y Condiciones</a>
        </div>
      </div>

    </form>

    <div class="social-auth-links text-center">
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingreso con Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Ingreso con Google</a>
    </div>

  </div>
  
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/templates/admin/AdminLTE-2.4.18/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<?php echo $proyVar;?>
<?php echo $txtVar;?>

<script src="<?= base_url() ?>assets/plugins/jquery.validate/jquery.validate.min.js"></script>

<script type="text/javascript">
  
$(function () {

      // Borrado de campos para Chrome
      setTimeout(function(){ 
        $("#nombre").val("");
        $("#apellidos").val("");
        $("#email").val("");
        $("#password").val("");
        $("#clave_validacion").val("");
        $("#captcha_challenge").val("");
      }, 1000);

      $("#refresh_captcha").click(function () {
        $("#img_captcha").attr("src", proyVar.base_url + "sistema/captcha");
      });

      $("input[name=nombre]").focus();

      $( "#forma_validacion_registro" ).validate( {
        rules: {
          nombre: {
            required: true,
            minlength: 2,
            maxlength: 50
          },
          apellidos: {
            required: true,
            minlength: 2,
            maxlength: 50
          },
          email: {
            required: true,
            email: true,
            minlength: 6,
            maxlength: 70, 
            remote: {
              url: proyVar.base_url + "sistema/correo_registro",
              type: "post",
              cache: false,
              data: {
                  email: function() { return $("#email").val(); },
                  sistema_id: function() { return $("#sistema_id").val(); }
              }
            }   
          },
          password: {
            required: true,
            minlength: 7,
            maxlength: 20
          },
          clave_validacion: {
            equalTo: "#password"
          },
          terminos: {
            required: true
          },
          captcha_challenge: {
            required: true,
            maxlength: 6, 
            minlength: 6  
          },
        },
        messages: {
          nombre: {
            required: txtVar.be_the_first_name_field_is_required,
            minlength: txtVar.be_your_first_name_must_have_at_least_2_characters,
            maxlength: txtVar.be_your_name_must_have_a_maximum_of_50_characters
          },
          apellidos: {
            required: txtVar.be_the_last_names_field_is_required,
            minlength: txtVar.be_your_last_name_must_have_at_least_2_characters,
            maxlength: txtVar.be_your_last_names_must_have_a_maximum_of_50_characters
          },
          email: {
            required: txtVar.be_the_email_field_is_required,
            email: txtVar.be_your_email_must_be_in_the_format_name_domain_com,
            minlength: txtVar.be_your_email_must_have_at_least_6_characters,
            maxlength: txtVar.be_your_email_must_have_a_maximum_of_70_characters,
            remote: jQuery.validator.format("{0} " + txtVar.be_already_exists)
          },
          password: {
            required: txtVar.be_the_new_password_field_is_required,
            minlength: txtVar.be_your_new_password_must_have_at_least_7_characters,
            maxlength: txtVar.be_your_new_password_must_have_a_maximum_of_20_characters
          },          
          clave_validacion: {
            equalTo: txtVar.be_incorrect_confirmation
          },          
          terminos: {
            required: txtVar.be_you_must_accept_the_terms
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