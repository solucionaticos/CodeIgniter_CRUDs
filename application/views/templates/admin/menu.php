
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/images/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>David Amador</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

<!--
        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/projects"><i class="fa fa-cloud"></i> <span>Projects</span></a></li>
-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cloud"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url(); ?>backend/campos"><i class="fa fa-circle-o text-aqua"></i>Campos</a></li>
            <li><a href="<?php echo base_url(); ?>backend/campos_validaciones"><i class="fa fa-circle-o text-aqua"></i>Campos Validaciones</a></li>
            <li><a href="<?php echo base_url(); ?>backend/cruds"><i class="fa fa-circle-o text-aqua"></i>CRUDs</a></li>
            <li><a href="<?php echo base_url(); ?>backend/cruds_detalles"><i class="fa fa-circle-o text-aqua"></i>CRUDs Detalles</a></li>
            <li><a href="<?php echo base_url(); ?>backend/datos"><i class="fa fa-circle-o text-aqua"></i>Datos</a></li>
            <li><a href="<?php echo base_url(); ?>backend/datos_valores"><i class="fa fa-circle-o text-aqua"></i>Datos Valores</a></li>
            <li><a href="<?php echo base_url(); ?>backend/languages"><i class="fa fa-circle-o text-aqua"></i>Languages</a></li>
            <li><a href="<?php echo base_url(); ?>backend/languages_variables"><i class="fa fa-circle-o text-aqua"></i>Lang Variables</a></li>
            <li><a href="<?php echo base_url(); ?>backend/languages_variables_values"><i class="fa fa-circle-o text-aqua"></i>Lang Var Values</a></li>
            <li><a href="<?php echo base_url(); ?>backend/proyectos"><i class="fa fa-circle-o text-aqua"></i>Proyectos</a></li>
            <li><a href="<?php echo base_url(); ?>backend/tablas"><i class="fa fa-circle-o text-aqua"></i>Tablas</a></li>
            <li><a href="<?php echo base_url(); ?>backend/versiones"><i class="fa fa-circle-o text-aqua"></i>Versiones</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Database</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields"><i class="fa fa-circle-o text-aqua"></i> Tables and Fields</a></li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/visualizations"><i class="fa fa-circle-o"></i> Visualizations</a>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/utilitiess"><i class="fa fa-circle-o"></i> Utilities</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/queries"><i class="fa fa-circle-o"></i> Queries</a></li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/validations"><i class="fa fa-circle-o text-aqua"></i> Validations</a></li>
<!--
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/mantenimientos/configuracion"><i class="fa fa-circle-o"></i> Validations</a></li>
-->

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/reports"><i class="fa fa-circle-o"></i> Reports</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/cruds"><i class="fa fa-circle-o"></i> CRUDs</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/imports"><i class="fa fa-circle-o"></i> Imports</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/relational_models" target="_blank"><i class="fa fa-circle-o text-aqua"></i> Relational Models</a></li>
          </ul>
        </li>



<!--
Bases de Datos
  Tablas y Campos
    http://localhost:8888/fabrica/bds/tablascampos
  Utilidades de BDs
    utilitidades.phtml
  SQLs:
    https://www.beta.daflores.com/fixes/fix_orders_product_cost.phtml?tab=18
  Consultar BDs con ajuste de campos
    https://www.beta.daflores.com/admin/utilidades.phtml
    Notas: Podria ser util para crear CRUDs
  Modelo Relacional

Validaciones
  http://localhost:8888/fabrica/cruds/ci_grocerycrud/admin/mantenimientos/configuracion
-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>CRUDs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/proyectos"><i class="fa fa-circle-o text-aqua"></i>PVTC</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/assistants"><i class="fa fa-circle-o text-aqua"></i>Asistentes</a></li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/cruds"><i class="fa fa-circle-o text-aqua"></i>CRUDS</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_grocerycrud"><i class="fa fa-circle-o text-aqua"></i> CI GroceryCrud</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables"><i class="fa fa-circle-o text-aqua"></i> CI Datatable + Modals</a></li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables_ssp"><i class="fa fa-circle-o text-aqua"></i> CI Datatable + SSP</a></li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/apis_nodejs"><i class="fa fa-circle-o text-aqua"></i> APIs Node.js + Adonis</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/apis_nodejs_express"><i class="fa fa-circle-o text-aqua"></i> APIs Node.js + Express</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/basic_php"><i class="fa fa-circle-o"></i> Basic PHP</a></li>
          </ul>
        </li>

<!--
CRUDs

CRUDs CodeIgniter GroceryCrud
  http://localhost:8888/fabrica/cruds/ci_grocerycrud/admin/proyectos/proyectos
CRUDs CodeIgniter Manual
  http://localhost:8888/fabrica/cruds/ci_excel/crear_uno
Generador de APIs
  Drive:Mi Unidad/Tablas y Campos
CRUDs Basico PHP Estructurado con Asistente de creacion de registros (FrameWork Personal)
  https://www.beta.daflores.com/admin/site/banners_home/lista.phtml
-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-microphone"></i> <span>Voice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/voice/designs"><i class="fa fa-circle-o"></i>Design</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/voice/tablas"><i class="fa fa-circle-o"></i>Tablas</a></li>
          </ul>
        </li>

<!--
Voz
  Diseño
  http://localhost:8888/fabrica/diseno/voz
-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i> <span>Scans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/scans/web_sites"><i class="fa fa-circle-o"></i>Web Sites</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/scans/local_projects"><i class="fa fa-circle-o"></i>Local Projects</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/scans/read_emails"><i class="fa fa-circle-o"></i>Read Emails</a></li>
          </ul>
        </li>

<!--
Escaneos

Escaneo de Sitios Web
  http://localhost:8888/fabrica/utilidades/escaneo_pagina_sitio_web
Escaneo de Proyectos Locales
  http://localhost:8888/fabrica/utilidades/escaneo_proyecto_local
-->


        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>Utilities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/utilities/tinymce"><i class="fa fa-circle-o"></i>TinyMCE</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/utilities/datatables"><i class="fa fa-circle-o"></i>Datatables</a></li>
          </ul>
        </li>

<!--
Utilidades

TinyMCE
  http://localhost:8888/fabrica/assets/plugins/editarea/exemples/exemple_full.html
Datatables.net
  http://localhost:8888/fabrica/assets/plugins/datatables/

MultiSelector de Registros
  https://www.beta.daflores.com/admin/site/addons.phtml

Lista + Formularios en una sola pagina con modales
  https://www.beta.daflores.com/admin/utilidades.phtml

Selector Grafico de Productos Categorizados con ordenamientos
  https://www.beta.daflores.com/admin/site/home_products/lista.phtml

Log de uso del sistema de cada usuario
  https://www.beta.daflores.com/admin/user/users_admin.phtml
  https://www.beta.daflores.com/admin/user/users_admin_time_line.phtml?num=2

Plantillas de Comunicados:
  https://www.beta.daflores.com/admin/orders/comm_templates.phtml
-->



        <li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> <span>Links</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/links/links"><i class="fa fa-circle-o"></i>Links</a></li>
          </ul>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
