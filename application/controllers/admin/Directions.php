<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Directions extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_directions");
    }
    public function index(){
        $data=$this->data;
        $list=$this->M_directions->get_list();
        $data=array(
            'title'=>"Danh sách phương hướng",
            'template'=>'directions/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
    public function create(){
        $this->form_validation->set_rules('name','Tên đơn vị','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');  
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $code=trim($this->input->post('code'));
            if($this->M_directions->check_exists(array('code'=>$code))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'status'=>1
                );
                if($this->M_directions->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/directions");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm phương hướng mới",
            'template'=>'directions/create',
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_directions->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/directions");
        }
       $this->form_validation->set_rules('name','Tên đơn vị','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');     
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $code=trim($this->input->post('code'));
            if($item->code!=$code && $this->M_directions->check_exists(array('code'=>$code))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                );
                if($this->M_directions->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                    redirect(base_url()."admin/directions");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Phương hướng: ".$item->name,
            'template'=>'directions/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_directions->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_directions->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/directions");
    }
    public function delete_all($id=0){
        if($this->M_directions->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_directions->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/directions");
    }
    
}