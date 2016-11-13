<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Units extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_units");
    }
    public function index(){
        $data=$this->data;
        $list=$this->M_units->get_list();
        $data=array(
            'title'=>"Danh sách đơn vị",
            'template'=>'unit/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
    public function create(){
        $this->form_validation->set_rules('name','Tên đơn vị','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');  
        $this->form_validation->set_rules('he_so','Hệ số','required|xss_clean'); 
        $this->form_validation->set_rules('he_nhan','Hệ nhân','required|xss_clean'); 
        $this->form_validation->set_rules('groups_type','Đối tượng áp dụng','required|xss_clean');  
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $code=trim($this->input->post('code'));
            $he_so=trim($this->input->post('he_so'));
            $he_nhan=trim($this->input->post('he_nhan'));
            $groups_type=trim($this->input->post('groups_type'));
            if($this->M_units->check_exists(array('code'=>$code,'groups_type'=>$groups_type))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'he_so'=>$he_so,
                    'he_nhan'=>$he_nhan,
                    'groups_type'=>$groups_type,
                    'status'=>1
                );
                if($this->M_units->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/units");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm đơn vị mới",
            'template'=>'unit/create',
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_units->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/units");
        }
       $this->form_validation->set_rules('name','Tên đơn vị','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');  
         $this->form_validation->set_rules('he_so','Hệ số','required|xss_clean'); 
         $this->form_validation->set_rules('he_nhan','Hệ nhân','required|xss_clean'); 
        $this->form_validation->set_rules('groups_type','Đối tượng áp dụng','required|xss_clean');    
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));;
            $code=trim($this->input->post('code'));
             $he_so=trim($this->input->post('he_so'));
             $he_nhan=trim($this->input->post('he_nhan'));
            $groups_type=trim($this->input->post('groups_type'));
            if($item->code!=$code && $this->M_units->check_exists(array('code'=>$code,'groups_type'=>$groups_type))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'he_so'=>$he_so,
                    'he_nhan'=>$he_nhan,
                    'groups_type'=>$groups_type
                );
                if($this->M_units->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                    redirect(base_url()."admin/units");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Đơn vị: ".$item->name,
            'template'=>'unit/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_units->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_units->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/units");
    }
    public function delete_all($id=0){
        if($this->M_units->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_units->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/units");
    }
    
}