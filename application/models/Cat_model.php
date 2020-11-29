<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of cdmodel
 *
 * @author http://roytuts.com
 */
class Cat_model extends CI_Model {


  function __construct() {

  }

  public function GetWhere($table, $order, $order_type, $cond = array()) { 
    if (count($cond) > 0) {
      foreach ($cond as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $this->db->order_by("$order", "$order_type");
    $query = $this->db->get($table);
    if ($query->num_rows() != 0 ) {
      return $query->result();
    }
  }


  public function get_all_list() { 
    $this->db->select('cat.id as id,cat.title as cat_title,main_cat.title as main_cat_title');
    $this->db->from('categories as cat'); 
    $this->db->join('categories as main_cat' , 'cat.main_cat_id = main_cat.id ','left');
    $this->db->order_by("cat_title", "ASC");
    $query = $this->db->get();
    if ($query->num_rows() != 0 ) {


      $aColumns_r = array(
        'id', 
        'cat_title', 
        'main_cat_title', 
      );

      foreach ($query->result_array() as $aRow) {
        $row = array();
        foreach ($aColumns_r as $col) { 
          if ($col != 'id' && $col != 'main_cat_title') {
            $row[] = $aRow[$col];
          }elseif ( $col == 'main_cat_title') {
            if($aRow[$col]==''){

            $row[] = 'Main Category';
            }else{

            $row[] = $aRow[$col];
            }
          }
        }
        $control = ' ';

        $control .= '<button type="button" class="btn btn-info "  onclick="add_form('.$aRow['id'].')"   title="Add sub category">Add sub category</button> 
 

        ';

        $row[] =   $control ;
        $output['data'][] = $row;
      }

      return $output;
    }


  }




}

/* End of file cdmodel.php */
/* Location: ./application/models/cdmodel.php */