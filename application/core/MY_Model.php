<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public $table = 'UndefinedTable';
    public $key = 'id';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getRow($table = '', $id, $key = '') {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        return $this->db->get_where($table, array($key => $id))->row();
    }

    public function getRowsJoin($table = '', $fields = '', $join = array(), $where = '', $order_by = '', $group_by = '', $having = array(), $limit = '', $start = '') {
        $data = array();
      
        if ($table != '') {
            $this->table = $table;
        }
      
        if ($fields != '') {
            $this->db->select($fields);
        }
        if (count($join)) {
            foreach ($join as $join_table => $join_reg) {
/*
echo "<pre>$join_table:";
print_r($join_reg);
echo "</pre>";
*/
                if ($join_reg[1] == '') {
                    $this->db->join($join_table, $join_reg[0]);
                } else {
                    $this->db->join($join_table, $join_reg[0], $join_reg[1]);
                }
/*
http://vevlo.com/codeigniter-join-query-inner-left-right-outer-left-outer-right-outer-join-example/
$this->db->select('table1.*, table2.*');
$this->db->from('table1');
---
$this->db->join('table2', 'table2.id = table1.id');
$this->db->join('table2', 'table2.id = table1.id', 'inner');
$this->db->join('table2', 'table2.id = table1.id', 'left');
$this->db->join('table2', 'table2.id = table1.id', 'right');
$this->db->join('table2', 'table2.id = table1.id', 'outer');
$this->db->join('table2', 'table2.id = table1.id', 'left outer');
$this->db->join('table2', 'table2.id = table1.id', 'right outer');
---
$this->db->where('table1.field_name','field_value');
$query = $this->db->get();
*/
            }
        }
        if (is_array($where)) {
            if (count($where)) {
                $this->db->where($where);
            }            
        } else {
            if ($where != '') {
                $this->db->where($where);
            }
        }
        if ($order_by != '') {
            $this->db->order_by($order_by);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by);
        }
        if (count($having)) {
            $this->db->having($having);
        }
      
        if ($limit != '' and $start != '') {
            $this->db->limit($limit, $start);
        } else {
            if ($limit != '') {
                $this->db->limit($limit);
            }
        }
        $Q = $this->db->get($this->table);

// print_r($this->db->last_query());
// echo "<hr>";

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    public function insert($table = '', $data) {
        if ($table != '') {
            $this->table = $table;
        }
        $success = $this->db->insert($this->table, $data);
/*
print_r($this->db->last_query());
echo "<hr>";
*/
        if ($success) {

//echo $this->db->insert_id();

            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function update($table = '', $data, $id = '', $key = '', $where = array()) {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        if (count($where)) {
            $this->db->where($where);
        } else {
            $this->db->where($key, $id);
        }
        return $this->db->update($table, $data);
    }

    public function delete($table = '', $id = '', $key = '', $where = array()) {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        if ( $id != '' ) {
            $this->db->where($key, $id);
        } else {
          if (count($where)) {
              $this->db->where($where);
          }      
        }
        $this->db->delete($table);

// print_r($this->db->last_query());
// echo "<hr>";
        
        return $this->db->affected_rows();
    }
  
    public function getNumRecords($table = '', $id, $key = '') {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        $this->db->where($key, $id);
        return  $this->db->count_all_results($table);
    }  

    public function getTotal($table = '') {
        if ($table == '') {
            $table = $this->table;
        }
        return $this->db->count_all($table);
    }

    public function getCurrentPageRecords($table = '', $limit, $start) {
        if ($table == '') {
            $table = $this->table;
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
            return $data;
        }
        return false;
    }
    
// ------------------------------------------------------------------

    public function registro($table = '', $id, $key = '') {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        return $this->db->get_where($table, array($key => $id))->row();
    }

    public function registros($table = '', $fields = '', $where = array(), $order_by = '', $group_by = '', $having = array(), $limit = '') {
        // https://codeigniter.com/user_guide/database/query_builder.html
        $data = array();
      
        if ($table != '') {
            $this->table = $table;
        }
      
        if ($fields != '') {
            $this->db->select($fields);
        }

        if (is_array($where)) {
            if (count($where)) {
                $this->db->where($where);
            }            
        } else {
            if ($where != '') {
                $this->db->where($where);
            }
        }

        if ($order_by != '') {
            $this->db->order_by($order_by);
        }

        if ($group_by != '') {
            $this->db->group_by($group_by);
        }

        if (count($having)) {
            $this->db->having($having);
        }
      
        if ($limit != '') {
            $this->db->limit($limit);
        }

//$sql = $this->db->last_query();
//echo "SQL: $sql <hr>";
      
        $Q = $this->db->get($this->table);

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();

        return $data;
    }

    public function insertar($table = '', $data) {
        // $data['fecha_creado'] = $data['fecha_actualizado'] = date('Y-m-d H:i:s');
        // $data['creado_ip'] = $data['actualizado_ip'] = $this->input->ip_address();
        if ($table != '') {
            $this->table = $table;
        }
        $success = $this->db->insert($this->table, $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function actualizar($table = '', $data, $id = '', $key = '', $where = array()) {
        // $data['fecha_actualizado'] = date('Y-m-d H:i:s');
        // $data['actualizado_ip'] = $this->input->ip_address();
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        if (count($where)) {
            $this->db->where($where);
        } else {
            $this->db->where($key, $id);
        }
        $resultado = $this->db->update($table, $data);

// print_r($this->db->last_query());
// echo "<hr>";

        return $resultado;
    }

    public function eliminar($table = '', $id = '', $key = '', $where = array()) {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        if (count($where)) {
            $this->db->where($where);
        } else {
            $this->db->where($key, $id);
        }
        return $this->db->delete($table);
    }
  
/*
    public function eliminar($table = '', $id = '', $llave = "", $where = array()) {
        if ($table != '') {
            $this->tabla = $table;
        }
        if ( $llave == "" ) {
            $llave = $this->llave;            
        }
        if ( $id != '' ) {
            $this->db->where($this->llave, $id);
        } else {
          if (count($where)) {
              $this->db->where($where);
          }      
        }
      
        $this->db->delete($this->tabla);
        return true; //$this->db->affected_rows();
    }
*/
  
    public function records($table = '', $id = '', $key = '', $where = array()) {
        if ($table == '') {
            $table = $this->table;
        }
        if ($key == '') {
            $key = $this->key;
        }
        if (count($where)) {
            $this->db->where($where);
        } else {
            $this->db->where($key, $id);
        }
        return  $this->db->count_all_results($table);
    }  

}