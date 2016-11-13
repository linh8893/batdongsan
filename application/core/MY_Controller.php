<?php

if ( ! defined('BASEPATH')) exit('Not Access!');
class MY_Controller extends CI_Controller {
    var $data = array(
        'template'=>"content-none",
        'title'=>'Bạn chưa thiết lập nội dung này',
        'script'=>'',
        'style'=>''
    );
    function __construct()
	{
	    //kế thừa từ CI_Controller
	    parent::__construct();
	    // Xu ly controller
	    $controller = $this->uri->segment(1);
	    $controller = strtolower($controller);
	    //kiểm tra xem trang hiện tại đang truy cập
	    switch ($controller)
	    {
	        case 'admin':
	        {
	        	if(!$this->_check_login()){
                                $this->_msg_admin("danger", "Bạn cần đăng nhập để thực hiện thao tác tiếp theo.");
	        		redirect(base_url().'admin/login');
	        	}else{
                            if(!$this->_check_account()){
                                $this->unset_account();
                                redirect(base_url().'admin/login');
                            }else{
                            	$role=$this->check_role();
                            	if($role!="admin")
                            	{
                            		$this->_msg_admin("danger", "Bạn không có quyền truy cập.");
                                	redirect(base_url());
	        						
                            	}
                            }
                        }
	            break;
	        }
	        case 'member':
	        {
	            break;
	        }
	        //Trang chủ
	        default:
	        {
	            break;
	        }
	    }
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
        public function check_role(){
        	 $account=$this->session->userdata("account");
        	 return $account['role'];
        }
        function _check_account(){
            $this->load->model("M_users");
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
		  <strong>'.$tmp.'</strong> '.$str.'
		</div>';
		$this->session->set_flashdata('msg_admin',$tmp);
	}
        function __to_slug($str)
        {
            $str = trim(mb_strtolower($str));
            $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
            $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
            $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
            $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
            $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
            $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
            $str = preg_replace('/(đ)/', 'd', $str);
            $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
            $str = preg_replace('/([\s]+)/', '-', $str);
            return $str;
        }

       public function phan_trang($url="",$total_page=1,$page=1){
       
       	if($total_page>1){
	       	$str='<div class="pagination-lp"><ul class="ok">';
	                    $str.='<li><a href="'.$url.'.html">Trang đầu</a></li>';
	                    for($i=1;$i<=$total_page;$i++){
	                    	$link=$url."/trang-".($i).".html";
	                    	if($i==$page){
	                    		$str.='<li class="active"><a href="'.$link.'">'.$i.'</a></li>';
	                    	}else{
		                    	$str.='<li><a href="'.$link.'">'.$i.'</a></li>';
		                    }
	                    }
	        $str.='</ul></div>';
	        return $str;
    	}
    	return "";
       }
    function check_captcha($site_key_post=0){
    	////lấy dữ liệu được post lên
    	/*$site_key_post    = $_POST['g-recaptcha-response'];*/
		$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
		$site_key    = '6LfgIwkUAAAAAMG3ce7MjTvzktHcry8DPxJtnDoz';
		$secret_key  = '6LfgIwkUAAAAAKgB57fahbAigKRwl0ibwVktAk0X';
		    //lấy IP của khach
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    } else {
	        $remoteip = $_SERVER['REMOTE_ADDR'];
	    }
	     
	    //tạo link kết nối
	    $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
	    //lấy kết quả trả về từ google
	    $response = file_get_contents($api_url);
	    //dữ liệu trả về dạng json
	    $response = json_decode($response);
	    if(!isset($response->success))
	    {
	        return "Mã xác nhận không hợp lệ";
	    }
	    if($response->success == true)
	    {
	        return true;
	    }else{
	        return "Mã xác nhận không hợp lệ";
	    }
	}
	public function sendMail($to,$header,$content){
        


        $this->load->library('email');
        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth']   = TRUE;
        //$config['smtp_host'] = "ssl://smtp.googlemail.com"; 
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_user'] = "batdongsanflan@gmail.com";
        $config['smtp_pass'] = "long04410095";
        /*
        $config['smtp_user'] = "phamvanlinh.tlhp@gmail.com";
        $config['smtp_pass'] = "Mo1giacmo";
        */
        $config['smtp_port'] = 465;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = TRUE;
        $config['bcc_batch_size'] = "200";
        
        $this->email->initialize($config);
        //$this->email->from('phamvanlinh.tlhp@gmail.com', 'phamvanlinh');
       $this->email->from('batdongsanflan@gmail.com', 'Bất động Sản Flan'); 
       $content.="<br><br><a style='margin-top: 10px;' href='http://batdongsanflan.com.vn'><img src='http://batdongsanflan.com.vn/asset/public/files/banner.png' style='width=100%; height: auto;'></a>";
        $this->email->to($to);    
        $this->email->subject($header);
        $this->email->message($content); 
        
        if ($this->email->send()) {
            return true;
        } else {
            $data['success'] = 0;
            $data['error'] = $this->email->print_debugger(array('headers'));
            print_r($data['error']);
            return false;
        }
    }

    function send_2()
	{
		 $config = array();
                $config['useragent']           = "CodeIgniter";
                $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
                $config['protocol']            = "smtp";
                $config['smtp_host']           = "localhost";
                $config['smtp_port']           = "25";
                $config['mailtype'] = 'html';
                $config['charset']  = 'utf-8';
                $config['newline']  = "\r\n";
                $config['wordwrap'] = TRUE;

                $this->load->library('email');

                $this->email->initialize($config);

                $this->email->from('xxx@gmail.com', 'admin');
                $this->email->to('xxx@gmail.com');
                $this->email->cc('xxx@gmail.com'); 
                $this->email->bcc($this->input->post('email')); 
                $this->email->subject('Registration Verification: Continuous Imapression');
                $msg = "Thanks for signing up!
            Your account has been created, 
            you can login with your credentials after you have activated your account by pressing the url below.
            Please click this link to activate your account:<a href=\"".base_url('user/verify')."/{$verification_code}\">Click Here</a>";

            $this->email->message($msg);   
            //$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));

            $this->email->send();
	}
         public function resize($file_name,$path)
    {
        $source_path= $path.$file_name;
        $target_path = $path."thumbnail/";
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '',
            'width' => 150,
            'height' => 150,
        );
        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        // clear //
        $this->image_lib->clear();
    }
}