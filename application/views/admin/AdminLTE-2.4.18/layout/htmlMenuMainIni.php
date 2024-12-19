<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/index1"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/index2"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Datos 1</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/pais/"><i class="fa fa-circle-o"></i> Paises</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/estado/"><i class="fa fa-circle-o"></i> Estados</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/ciudad/"><i class="fa fa-circle-o"></i> Ciudades</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/sedes/"><i class="fa fa-circle-o"></i> Sedes</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/empresa/"><i class="fa fa-circle-o"></i> Empresa</a></li>


                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Empleados
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/empleados/"><i class="fa fa-circle-o"></i> Empleados</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/empleados_cargo/"><i class="fa fa-circle-o"></i> Cargo</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/empleados_contratos/"><i class="fa fa-circle-o"></i> Contratos</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/empleados_documentos/"><i class="fa fa-circle-o"></i> Documentos</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/empleados_info_extra/"><i class="fa fa-circle-o"></i> Info Extra</a></li>
                  </ul>
                </li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/grocery/cuentas_pagar/"><i class="fa fa-circle-o"></i> Cuentas por Pagar</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Datos 2</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/pais/"><i class="fa fa-circle-o"></i> Paises</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/estado/"><i class="fa fa-circle-o"></i> Estados</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/ciudad/"><i class="fa fa-circle-o"></i> Ciudades</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/sedes/"><i class="fa fa-circle-o"></i> Sedes</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/empresa/"><i class="fa fa-circle-o"></i> Empresa</a></li>


                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Empleados
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/empleados/"><i class="fa fa-circle-o"></i> Empleados</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/empleados_cargo/"><i class="fa fa-circle-o"></i> Cargo</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/empleados_contratos/"><i class="fa fa-circle-o"></i> Contratos</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/empleados_documentos/"><i class="fa fa-circle-o"></i> Documentos</a></li>
                    <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/empleados_info_extra/"><i class="fa fa-circle-o"></i> Info Extra</a></li>
                  </ul>
                </li>

            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database1/cuentas_pagar/"><i class="fa fa-circle-o"></i> Cuentas por Pagar</a></li>

          </ul>
        </li>

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
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/tables/proyectos"><i class="fa fa-circle-o text-aqua"></i>Projects</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/tables/versiones"><i class="fa fa-circle-o text-aqua"></i>Versions</a></li>
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
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/relational_models"><i class="fa fa-circle-o text-aqua"></i> Relational Models</a></li>
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
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/cruds"><i class="fa fa-circle-o text-aqua"></i>CRUDS</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_grocerycrud"><i class="fa fa-circle-o text-aqua"></i> CI GroceryCrud</a></li>
            <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables"><i class="fa fa-circle-o text-aqua"></i> CI Datatable</a></li>
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
