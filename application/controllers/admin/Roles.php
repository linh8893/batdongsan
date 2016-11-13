<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Roles extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_roles");
    }
    public function index(){
        $data=$this->data;
        $list=$this->M_roles->get_list();
        $data=array(
            'title'=>"Danh vai trò & quyền hạn",
            'template'=>'role/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function create(){
        $this->form_validation->set_rules('name','Tên vai trò & quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('role','Tên rút gọn','required|xss_clean');  
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $role=trim($this->input->post('role'));
            if($this->M_roles->check_exists(array('role'=>$role))){
                $this->_msg_admin("warning", "Vai trò này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'role'=>$role,
                    'status'=>1
                );
                if($this->M_roles->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/roles");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm vai trò & quyền hạn",
            'template'=>'role/create',
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_roles->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/roles");
        }
       $this->form_validation->set_rules('name','Tên vai trò & quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('role','Tên rút gọn','required|xss_clean');  
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $role=trim($this->input->post('role'));
            if($item->role!=$role && $this->M_roles->check_exists(array('role'=>$role))){
                $this->_msg_admin("warning", "Vai trò này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'role'=>$role,
                    
                );
                if($this->M_roles->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                    redirect(base_url()."admin/roles");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Vai trò: ".$item->name,
            'template'=>'role/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_roles->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_roles->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/roles");
    }
    public function delete_all($id=0){
        if($this->M_roles->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_roles->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/roles");
    }
    
}