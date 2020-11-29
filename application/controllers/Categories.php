<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	public function __construct() {
		parent::__construct(); 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Cat_model', 'cat_model');
	}
	public function index() { 

		$this->data['view'] = "view";
		$this->load->view('layout', $this->data);
	}

// get list of all categories  (all main or sub category)
	public function get_list() {
		if ($this->input->is_ajax_request()) {
			$results = $this->cat_model->get_all_list();
			echo json_encode($results);
		}
	}

	// add main or sub category
	public function add_cat() { 
		if (!$this->input->is_ajax_request()) {
			die();
		}
		$main_cat_id =  $this->input->post('main_cat_id');
		$title = $this->input->post('title');  


		$array_data['main_cat_id'] = $main_cat_id ; 
		$array_data['title'] = $title ;  
		$this->db->insert("categories" , $array_data); 
		$result = array('statu' => 'ok');
		echo json_encode($result);

	}

	// ajax form to add main or sub category
	public function get_add_form($cat_id) {

		if (!$this->input->is_ajax_request()) {
			die();
		}

		$category_detailes = $this->cat_model->GetWhere("categories", "title", "ASC", array('id'=>$cat_id));  
			if (isset($category_detailes) && count($category_detailes) != 0) { 
				foreach ($category_detailes as $cat) { 
					$title= $cat->title ;
				}  
			}

		$content = "<div style='background-color:#ddd' clas='table-responsive ls-table'><table  class='table table-responsive table-bordered table-hover' ><tr>";


		$content .= " <td><input type='hidden' id='main_cat_id' value='$cat_id'> 
		<input type='text' style='width: 98%;'  id='title' placeholder='title'   ><br><br>";


		$content .= "</tr></table>   
		</div>";
		if($cat_id==0){

		$result = array('title' => "<b>Add main category </b>", "content" => $content); 
		}else{

		$result = array('title' => "<b>Add sub category to ".$title."</b>", "content" => $content); 
		}

		echo json_encode($result);
	}

// get list of main categories 
	public function main_categories()
	{    
		if ($this->input->is_ajax_request()) {
			$main_categories = $this->cat_model->GetWhere("categories", "title", "ASC", array('main_cat_id'=>0)); 

			if (isset($main_categories) && count($main_categories) != 0) {
				$id_num=0;
				$id="sub_cat_id".$id_num;
				$div="div_".$id_num;
				echo '<select id="'.$id.'"   onclick="get_sub_category('.$id_num.');">'; 
				echo '<option  disabled selected>Select main category</option>';

				foreach ($main_categories as $cat) { 
					echo '<option value="'.$cat->id.'">'.$cat->title.'</option>';
				}

				echo '</select><div id="'.$div.'"> </div><br>';


			}
		}


	} 

// get list of sub categories  acording to main category id 
	public function sub_categories()
	{   

		if ($this->input->is_ajax_request()) {
			$main_cat_id = $_POST['main_cat_id'];

			$sub_categories = $this->cat_model->GetWhere("categories", "title", "ASC", array('main_cat_id'=> $main_cat_id)); 

			if (isset($sub_categories) && count($sub_categories) != 0) {
				$id="sub_cat_id".$main_cat_id;
				$div="div_".$main_cat_id;
				echo '<select id="'.$id.'"   onclick="get_sub_category('.$main_cat_id.');">';
				echo '<option  disabled selected>Select Sub category</option>';

				foreach ($sub_categories as $cat) {				
					echo '<option value="'.$cat->id.'">'.$cat->title.'</option>';
				}
				echo '</select><div id="'.$div.'"> </div><br>';


			}


		} 
	}

}
