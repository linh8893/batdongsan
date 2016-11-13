<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Acreages extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_acreages");
    }
    public function index(){
        $data=$this->data;
        $list=$this->M_acreages->get_list();
        $data=array(
            'title'=>"Danh sách mức diện tích",
            'template'=>'acreages/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
    public function create(){
        $this->form_validation->set_rules('name','Tiêu đề','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');  
        $this->form_validation->set_rules('min_value','Giá trị thấp nhất','numeric|xss_clean');
        $this->form_validation->set_rules('max_value','Giá trị cao nhất','numeric|xss_clean');
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $code=trim($this->input->post('code'));
            $min_value=trim($this->input->post('min_value'));
            $max_value=trim($this->input->post('max_value'));
            if($this->M_acreages->check_exists(array('code'=>$code))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'min_value'=>$min_value,
                    'max_value'=>$max_value,
                    'status'=>1
                );
                if($this->M_acreages->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/acreages");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm mức diện tích mới",
            'template'=>'acreages/create',
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_acreages->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/acreages");
        }
       $this->form_validation->set_rules('name','Tiêu đề','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');   
         $this->form_validation->set_rules('min_value','Giá trị thấp nhất','numeric|xss_clean');
        $this->form_validation->set_rules('max_value','Giá trị cao nhất','numeric|xss_clean');  
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $code=trim($this->input->post('code'));
            $min_value=trim($this->input->post('min_value'));;
            $max_value=trim($this->input->post('max_value'));
            if($item->code!=$code && $this->M_acreages->check_exists(array('code'=>$code))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'min_value'=>$min_value,
                    'max_value'=>$max_value,
                );
                if($this->M_acreages->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                    redirect(base_url()."admin/acreages");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Tiêu đề: ".$item->name,
            'template'=>'acreages/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_acreages->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_acreages->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/acreages");
    }
    public function delete_all($id=0){
        if($this->M_acreages->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_acreages->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/acreages");
    }
    
}