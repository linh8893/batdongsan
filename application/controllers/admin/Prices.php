<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Prices extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_prices");
    }
    public function index(){
        $data=$this->data;
        $list=$this->M_prices->get_list();
        $data=array(
            'title'=>"Danh sách mức giá",
            'template'=>'prices/list',
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
            $name=trim($this->input->post('name'));
            $code=trim($this->input->post('code'));
            $units_code_1=trim($this->input->post('units_1'));
            $units_code_2=trim($this->input->post('units_2'));
            $groups_type=trim($this->input->post('groups_type'));
            $min_value=trim($this->input->post('min_value'));;
            $max_value=trim($this->input->post('max_value'));
            $min_price=0;
            $max_price=0;

            $unit=$this->M_units->get_item_code($units_code_1);
            if($unit!=false){
                $min_price=$min_value*$unit->he_so;
            }
            $unit=$this->M_units->get_item_code($units_code_2);
            if($unit!=false){
                $max_price=$max_value*$unit->he_so;
            }
            if($this->M_prices->check_exists(array('code'=>$code))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'min_value'=>$min_value,
                    'max_value'=>$max_value,
                    'groups_type'=>$groups_type,
                    'units_code_1'=>$units_code_1,
                    'units_code_2'=>$units_code_2,
                    'min_price'=>$min_price,
                    'max_price'=>$max_price,
                    'status'=>1
                );
                if($this->M_prices->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/prices");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm mức giá mới",
            'template'=>'prices/create',
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_prices->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/prices");
        }
       $this->form_validation->set_rules('name','Tiêu đề','required|xss_clean');
        $this->form_validation->set_rules('code','Mã','required|xss_clean');   
        $this->form_validation->set_rules('min_value','Giá trị thấp nhất','numeric|xss_clean');
        $this->form_validation->set_rules('max_value','Giá trị cao nhất','numeric|xss_clean');  
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));
            $code=trim($this->input->post('code'));
            $units_code_1=trim($this->input->post('units_1'));
            $units_code_2=trim($this->input->post('units_2'));
            $groups_type=trim($this->input->post('groups_type'));
            $min_value=trim($this->input->post('min_value'));;
            $max_value=trim($this->input->post('max_value'));
            $min_price=0;
            $max_price=0;

            $unit=$this->M_units->get_item_code($units_code_1);
            if($unit!=false){
                $min_price=$min_value*$unit->he_so;
            }
            $unit=$this->M_units->get_item_code($units_code_2);
            if($unit!=false){
                $max_price=$max_value*$unit->he_so;
            }
            if($item->code!=$code && $this->M_prices->check_exists(array('code'=>$code))){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'code'=>$code,
                    'min_value'=>$min_value,
                    'max_value'=>$max_value,
                    'groups_type'=>$groups_type,
                    'units_code_1'=>$units_code_1,
                    'units_code_2'=>$units_code_2,
                    'min_price'=>$min_price,
                    'max_price'=>$max_price,
                );
                if($this->M_prices->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                    redirect(base_url()."admin/prices");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Mức giá : ".$item->name,
            'template'=>'prices/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_prices->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_prices->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/prices");
    }
    public function delete_all($id=0){
        if($this->M_prices->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_prices->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/prices");
    }
    
}