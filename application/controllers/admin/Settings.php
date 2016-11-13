<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined("BASEPATH") OR exit("No Access");
class Settings extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_settings");
    }
    public function index(){
       $item=$this->M_settings->get_item_slug("setting");
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/settings");
        }
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Điện thoại','required');
        $this->form_validation->set_rules('address','Địa chỉ','required');
        if($this->form_validation->run()){
            $tmp=array(
                'email'=>$this->input->post('email'),
                'phone'=>$this->input->post('phone'),
                'address'=>$this->input->post('address'),
                'zalo'=>$this->input->post('zalo'),
                'facebook'=>$this->input->post('facebook'),
                'skype'=>$this->input->post('skype'),
                'banner'=>$this->input->post('banner'),
                'banner_link'=>$this->input->post('banner_link'),
            );
            if($this->M_settings->update($item->id,$tmp)){
                $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                redirect(base_url()."admin/settings");
            }else{
                $this->_msg_admin("danger", "Không lưu trữ được");
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Chỉnh sửa cấu hình ",
            'template'=>'setting/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    
    
}