<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	/* 	function  __construct() {
				parent::__construct();
				// Load session library
				$this->load->library('session');
				
				// Load file model
				$this->load->model('file');
			} */
	public function index(){
			$data['getAuthor']=$this->Module_model->getAuthor();
			$this->load->view('admin/templates/header');
			$this->load->view('admin/module/addAuthor',$data);
			$this->load->view('admin/templates/footer');
		
	}
	
	public function addModule1(){
        $data = array();
		$uploadData = array();
		$title=$this->input->post('title_name');
			if (!is_dir('./assets/image/'.$title)) {
				mkdir('./assets/image/' . $title, 0777, TRUE);
			}
			$config['upload_path']= './assets/image/'.$title;
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			
            $filesCount = count($_FILES['files']['name']);
			$author_name = $this->input->post('author_name');
			$author_desc = $this->input->post('author_desc');
			$author = $this->input->post('author_name');
			
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                                
				$config['file_name'] =   $author."_".$_FILES['files']['name'][$i];
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
                
               if($this->upload->do_upload('file')){
                    $fileData = $this->upload->data();
                    $uploadData[] .= $author."_".$_FILES['files']['name'][$i];
				} 
            }
			$data = array(
							'title'=>$title,
							'description'=>$author_desc,
							'author'=>$author,
							'image'=>implode(",",$uploadData)
							);
						if(!empty($data)){
						$add_author=$this->Module_model->addAuthor($data);
						$statusMsg = $add_author?'Author uploaded successfully.':'Some problem occurred, please try again.';
						$this->session->set_flashdata('statusMsg',$statusMsg);
						}
						$data['listAuthor'] = $this->Module_model->getAuthor();
						$this->load->view('admin/templates/header');
						$this->load->view('admin/module/listAuthor',$data);
						$this->load->view('admin/templates/footer');						
				
            
            

}




public function delete_image(){
	echo "In"; exit;
			/* echo $aid; echo "</br>"; $aid,$image
			echo $image; */
	}
	public function listAuthor(){
			$data['listAuthor'] = $this->Module_model->getAuthor();
			$this->load->view('admin/templates/header');
			$this->load->view('admin/module/listAuthor',$data);
			$this->load->view('admin/templates/footer');
	}
	
	public function editAuthor($id){
			$data['editAuthor']=$this->Module_model->editAuthor($id);
			$this->load->view('admin/templates/header');
			$this->load->view('admin/module/editAuthor',$data);
			$this->load->view('admin/templates/footer');
		

	}
	public function search_author($id){
			$data['search_author']=$this->Module_model->search_author($id);
			//print_r($data); exit;
			echo json_encode($data['search_author'][0]);
		}
		public function search_text($id){
			$data['search_text']=$this->Module_model->search_text($id);
			//print_r($data); exit;
			
			echo json_encode($data['search_text']);
		}
	public function updateAuthor($a_id){
			$uploadData = array();
			$title=$this->input->post('title_name');
			$author_name = $this->input->post('author_name');
			$author_desc = $this->input->post('author_desc');
			$author = $this->input->post('author_name');
			//////////////////////////////
			$config['upload_path']= './assets/image/'.$title;
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$filesCount = sizeof($_FILES['files']['name']);
			if ($filesCount>=1)
		{
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                $config['file_name'] =   $author."_".$_FILES['files']['name'][$i];
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('file')){
                    $fileData = $this->upload->data();
                    $uploadData[] .= $author."_".$_FILES['files']['name'][$i];
				}  
            }
			$data = array('image'=>implode(",",$uploadData));

			//echo "<pre>";print_r(implode(",",$uploadData)); exit;
			
			$update_image=$this->Module_model->updateAuthor($a_id,$data); //exit;
		}
		 //exit;
		$data = array(
							'description'=>$author_desc,
							'author'=>$author,
							);
			
						if(!empty($data)){
						$update_author=$this->Module_model->updateAuthor($a_id,$data);
						$statusMsg = $update_author?'Author Updated successfully.':'Some problem occurred, please try again.';
						$this->session->set_flashdata('statusMsg',$statusMsg);
						}
						$data['listAuthor'] = $this->Module_model->getAuthor();
						$this->load->view('admin/templates/header');
						$this->load->view('admin/module/listAuthor',$data);
						$this->load->view('admin/templates/footer');						
				}
}