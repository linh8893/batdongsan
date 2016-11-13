<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Users extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_users");
    }
    public function index(){
        $data=$this->data;
        $list=$this->M_users->get_list();
        $data=array(
            'title'=>"Danh sách người dùng",
            'template'=>'users/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function create(){
        $this->form_validation->set_rules('full_name','Họ và tên','required|xss_clean');
        $this->form_validation->set_rules('password','Mật khẩu','required|xss_clean');
        $this->form_validation->set_rules('password_again','Xác nhận mật khẩu','required|xss_clean|matches[password]');
        $this->form_validation->set_rules('role','Vai trò, quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('phone','Điện thoại','required|xss_clean');
        $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
        $this->form_validation->set_rules('address','Địa chỉ','xss_clean');
        $this->form_validation->set_rules('zalo','Zalo','xss_clean');
        $this->form_validation->set_rules('facebook','Facebook','xss_clean');
        $this->form_validation->set_rules('skype','Skype','xss_clean');
        if($this->form_validation->run()){
            $password=trim($this->input->post('password'));
            $full_name=trim($this->input->post('full_name'));
            $role=trim($this->input->post('role'));
            $phone=trim($this->input->post('phone'));
            $email=trim($this->input->post('email'));
            $address=trim($this->input->post('address'));
            $avatar=trim($this->input->post('avatar'));
            $facebook=trim($this->input->post('facebook'));
            $skype=trim($this->input->post('skype'));
            $zalo=trim($this->input->post('zalo'));
            if($this->M_users->check_exists(array('email'=>$email)) || $this->M_users->check_exists(array('phone'=>$phone))){
                $this->_msg_admin("warning", "Vui lòng sử dụng email hoặc số điện thoại khác");
            }else{
                $tmp=array(
                    'password'=>md5($password),
                    'full_name'=>$full_name,
                    'role'=>$role,
                    'phone'=>$phone,
                    'email'=>$email,
                    'address'=>$address,
                    'create_time'=>time(),
                    'avatar'=>$avatar,
                    'facebook'=>$facebook,
                    'skype'=>$skype,
                    'zalo'=>$zalo,
                    'status'=>1
                );
                if($this->M_users->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/users");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm người dùng mới",
            'template'=>'users/create',
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_users->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/users");
        }

        $this->form_validation->set_rules('full_name','Họ và tên','required|xss_clean');
        $this->form_validation->set_rules('password','Mật khẩu','required|xss_clean');
        $this->form_validation->set_rules('password_again','Xác nhận mật khẩu','required|xss_clean|matches[password]');
        $this->form_validation->set_rules('role','Vai trò, quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('phone','Điện thoại','required|xss_clean');
        $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
        $this->form_validation->set_rules('address','Địa chỉ','xss_clean');
        $this->form_validation->set_rules('zalo','Zalo','xss_clean');
        $this->form_validation->set_rules('facebook','Facebook','xss_clean');
        $this->form_validation->set_rules('skype','Skype','xss_clean');
        if($this->form_validation->run()){
            $password=trim($this->input->post('password'));
            $full_name=trim($this->input->post('full_name'));
            $role=trim($this->input->post('role'));
            $phone=trim($this->input->post('phone'));
            $email=trim($this->input->post('email'));
            $address=trim($this->input->post('address'));
            $avatar=trim($this->input->post('avatar'));
            $facebook=trim($this->input->post('facebook'));
            $skype=trim($this->input->post('skype'));
            $zalo=trim($this->input->post('zalo'));

            if($password!=$item->password){
 
                $password=md5($password);
            }
            if(($email!=$item->email && $this->M_users->check_exists(array('email'=>$email))) || ($item->phone!=$phone && $this->M_users->check_exists(array('phone'=>$phone)))){
                $this->_msg_admin("warning", "Vui lòng sử dụng email hoặc số điện thoại khác");
            }else{
                $tmp=array(
                    'password'=>$password,
                    'full_name'=>$full_name,
                    'role'=>$role,
                    'phone'=>$phone,
                    'email'=>$email,
                    'address'=>$address,
                    'create_time'=>time(),
                    'avatar'=>$avatar,
                    'facebook'=>$facebook,
                    'skype'=>$skype,
                    'zalo'=>$zalo,
                    'update_time'=>time()
                );

                if($this->M_users->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã cập nhật thành công!");
                    redirect(base_url()."admin/users");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Tài khoản: ".$item->full_name,
            'template'=>'users/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_users->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_users->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/users");
    }
    public function delete($id=0){
        if($this->M_users->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_users->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/users");
    }
    
}