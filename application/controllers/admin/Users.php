<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Users
 * @version: 1.0
 * @date: 2019-04-23 17:54:27 
 * */

class Users extends MY_Controller {

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Administrative Security Control
        $this->load->library("grocery_CRUD"); // GroceryCrud library
    }

    //-- Index Method --------
    public function index() {
        $crud = new grocery_CRUD();
        $crud->set_table("users"); // Table
        $crud->order_by('id','desc');
        //-- List --------
        $crud->columns("name","surname","email","city","web","expertise_id","approbation");
        //-- New --------
        $crud->add_fields("name","surname","email","city","web","expertise_id","approbation");
        //-- Edit --------
        $crud->edit_fields("name","surname","email","city","web","expertise_id","approbation");
        //-- Read --------
         //if ($this->uri->segment(4) === 'read') {
            $crud->set_read_fields("name","surname","email","city","web","expertise_id","approbation","date_created");
         //}

        //-- Labels --------
        $crud->display_as("name",$this->lang->line('b_users_label_name', FALSE));
        $crud->display_as("surname",$this->lang->line('b_users_label_surname', FALSE));
        $crud->display_as("email",$this->lang->line('b_users_label_email', FALSE));
        //$crud->display_as("password",$this->lang->line('b_users_label_password', FALSE));
        $crud->display_as("city",$this->lang->line('b_users_label_city', FALSE));
        $crud->display_as("web",$this->lang->line('b_users_label_web', FALSE));
        $crud->display_as("expertise_id",$this->lang->line('b_users_label_expertise_id', FALSE));
        $crud->display_as("approbation",$this->lang->line('b_users_label_approbation', FALSE));
        //$crud->display_as("code_pass_change",$this->lang->line('b_users_label_code_pass_change', FALSE));
        $crud->display_as("date_created",$this->lang->line('b_users_label_date_created', FALSE));

        //-- Field Types --------
        $crud->field_type("name", "string");
        $crud->field_type("surname", "string");
        $crud->field_type("email", "string");
        //$crud->field_type("password", "password");
        $crud->field_type("city", "string");
        $crud->field_type("web", "string");
        $crud->field_type("approbation", "text");
        //$crud->field_type("code_pass_change", "string");

        //-- Validations --------
        $crud->required_fields('name', 'surname', 'email');

        // -- Unset Buttons -----
        $crud->unset_export();
        $crud->unset_print();

        //-- Relations 1-N --------
        $crud->set_relation("expertise_id", "user_expertice","expertice");

        //-- Methods (Before...)
        $crud->callback_before_insert(array($this, "users_before_insert"));
        $crud->callback_before_update(array($this, "users_before_update"));
        $crud->callback_before_delete(array($this, "users_before_delete"));

        //-- Methods (After...) 
        $crud->callback_after_insert(array($this, "users_after_insert"));
        $crud->callback_after_update(array($this, "users_after_update"));
        $crud->callback_after_delete(array($this, "users_after_delete"));

        $crudTable = $crud->render(); // Render
        $this->crudShow($crudTable, $this->lang->line('b_crud_users', FALSE), '', '', '', '', '', 0, '', '4_1'); // Show CRUD
    }

    //-- Before Insert --------
    public function users_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }

        return $post;
    }   
    
    //-- Before Update --------
    public function users_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }

        return $post;
    }

    //-- Before Delete --------
    public function users_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }

        return true;
    }

    //-- After Insert --------
    public function users_after_insert($post,$id) {


        return true;
    }

    //-- After Update --------
    public function users_after_update($post,$id) {

        return true;
    }

    //-- After Delete --------
    public function users_after_delete($id) {

        return true;
    }
}

