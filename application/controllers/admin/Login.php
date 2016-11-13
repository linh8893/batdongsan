<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
        public function __construct() {
            parent::__construct();
         
        }
	public function index()
	{
            if($this->_check_login()){
                if(!$this->_check_account()){
                    $this->unset_account();
                }else{
                    $this->_msg_admin("success"," Đăng nhập thành công");
                    redirect(base_url()."admin/dashboard");
                }
            }
            $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
            $this->form_validation->set_rules('password','Mật khẩu','required|xss_clean');
            if($this->form_validation->run()){
                $email=trim($this->input->post('email'));
                $password=trim($this->input->post('password'));
                $where=array(
                    'email'=>$email,
                    'password'=>md5($password),
                );
                $user=$this->M_users->get_item_rule($where);
                if(!$user){
                    
                    $this->_msg_admin("danger", "Thông tin đăng nhập không chính xác.");
                }else{
                    if($user->status!=1){
                       
                        $this->_msg_admin("danger", "Tài khoản của bạn đang bị khóa.");
                    }else{
                        $account=array(
                            'id'=>$user->id,
                            'full_name'=>$user->full_name,
                            'email'=>$user->email,
                            'phone'=>$user->phone,
                            'password'=>$user->password,
                            'role'=>$user->role,
                            'status'=>$user->status,
                            'address'=>$user->address
                            
                        );
                        $this->session->set_userdata('account',$account);
                        $this->_msg_admin("success", "Bạn đã đăng nhập thành công.");
                        redirect(base_url()."admin/dashboard");
                    }
                }
            }
            $this->load->view('admin/login');

	}
        public function sign_out(){
            $this->session->unset_userdata("account");
            $this->_msg_admin("success", "Bạn đã đăng xuất thành công.");
            redirect(base_url()."admin/login");
        }
        public function unset_account(){
            $this->session->unset_userdata("account");
            redirect(base_url()."admin/login");
        }
        function _check_account(){
            $account=$this->session->userdata("account");
            $user=$this->M_users->get_item($account['id']);
            if(!$user){
                $this->_msg_admin("danger", "Tài khoản không tồn tại.");
                return false;
            }else{
                if($user->status!=1){
                    $this->_msg_admin("danger", "Tài khoản đang bị khóa.");
                    return false;
                }else{
                    if($user->password!=$account['password']){
                        $this->_msg_admin("warning", "Hãy đăng nhập lại.");
                        return false;
                    }else {
                        return true;
                    }
                }
            }
            return true;
        }
	function _check_login(){
		$account=$this->session->userdata("account");
		if(empty($account)){
			return false;
		}else{
			return true;
		}
	}
	public function _msg_admin($type="info",$str=""){
		$tmp="";
		switch ($type) {
			case 'success':
				$tmp="Thành công!";
				break;
			case 'warning':
				$tmp="Cảnh báo!";
				break;
			case 'info':
				$tmp="Thông báo!";
				break;
			case 'danger':
				$tmp="Đã có lỗi!";
				break;
			default:
				$tmp="Thông báo!";
				$type="info";
				break;
		}
		$tmp='<div class="alert alert-'.$type.' alert-admin">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>'.$tmp.'</strong> '.$str.'.
		</div>';
		$this->session->set_flashdata('msg_admin',$tmp);
	}
}
