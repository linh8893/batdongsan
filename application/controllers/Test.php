<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("Khong duoc phep truy cap");

class Test extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->form_validation->set_rules('ten','Hinhf anh','required');
        $path="asset/public/test/";
        if($this->form_validation->run()){
           
             $image=$this->input->post('image');
             
             if($_FILES['image']['type'] === "image/jpeg" || $_FILES['image']['type']=== "image/png" || $_FILES['image']['type'] === "image/gif"){
                $name="anh_bat_dong_san_".time();
                print_r($_FILES['image']);
                switch ($_FILES['image']['type']){
                    case "image/jpeg":
                        $name.=".jpeg";
                        break;
                    case "image/png":
                        $name.=".png";
                        break;
                    case "image/gif":
                        $name.=".gif";
                        break;
                }
                $tmp_image=array(
                    'name'=>$name,
                    'create_time'=>time(),
                    'size'=>$_FILES['image']['size'],
                    'vi_tri'=>1,
                );
                if(move_uploaded_file($_FILES['image']['tmp_name'],$path.$name)){
                    //$this->M_images->create($tmp_image);
                    $this->resize($name,$path);
                    echo "Uploadf thanh cong";
                }
            }
            
        }
        $this->load->view('test');
    }
   
}
