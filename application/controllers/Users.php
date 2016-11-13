<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	public function index()
	{
        
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
	}
    
    public function production_delete($id=0){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        if(!$this->check_user_production($id)){
            $this->_msg_admin("warning", "Bạn không có quyền với tin này");
            redirect(base_url()."quan-ly-tin.html");
        }
        $item=$this->M_productions->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Tin nay khong ton tai");
            redirect(base_url()."quan-ly-tin.html");
        }
        if($this->M_productions->delete($id)){
            $path="asset/public/upload/";
            if($item->thumbnail!="thumbnail.gif"){
                unlink($path."thumbnail/".$item->thumbnail);
            }
            $input=array();
            $input['where']=array('production_id'=>$id);
            $images=$this->M_images->get_list($input);
            foreach ($images as $row){
                unlink($path.$row->name);
            }
            $this->M_images->del_rule($input['where']);
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."quan-ly-tin.html");
    }
    public function switch_productions_status($id=0){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        if(!$this->check_user_production($id)){
            $this->_msg_admin("warning", "Bạn không có quyền với tin này");
            redirect(base_url()."quan-ly-tin.html");
        }
        $item=$this->M_productions->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_productions->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."quan-ly-tin.html");
    }
    public function dang_lai($id){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        if(!$this->check_user_production($id)){
            $this->_msg_admin("warning", "Bạn không có quyền với tin này");
            redirect(base_url()."quan-ly-tin.html");
        }
        $item=$this->M_productions->get_item($id);
        $tmp=array(
            'public_time'=>$item->public_time+(15*60*60*24),
            'exp_time'=>$item->exp_time+(15*60*60*24)
        );
        if($this->M_productions->update($id,$tmp)){
            $this->_msg_admin("success"," Đăng lại thành công");
        }else{
             $this->_msg_admin("warning"," Đăng lại không thành công");
        }
        redirect(base_url()."quan-ly-tin.html");
    }
    public function dang_moi($id){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        if(!$this->check_user_production($id)){
            $this->_msg_admin("warning", "Bạn không có quyền với tin này");
            redirect(base_url()."quan-ly-tin.html");
        }
        $item=$this->M_productions->get_item($id);
        $date=strtotime('00:00 '.date('d-m-Y',time()));
        $tmp=array(
            'public_time'=>$date,
            'exp_time'=>$date+(15*60*60*24)
        );
        if($this->M_productions->update($id,$tmp)){
            $this->_msg_admin("success"," Đăng mới thành công");
        }else{
             $this->_msg_admin("warning"," Đăng mới không thành công");
        }
        redirect(base_url()."quan-ly-tin.html");
    }
    public function productions($page=1){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        $account=$this->session->userdata('account');

        $bds_id = isset($_GET['bds_id'])?$_GET['bds_id']:'';
        $start_date= isset($_GET['start_date'])?$_GET['start_date']:"";
        if($start_date==""){
            $start_date='00:00 01-01-2016';
        }
        $end_date = isset($_GET['end_date'])?$_GET['end_date']:"";
        if($end_date==""){
            $end_date="23:59 ".date('d-m-Y',time());
        }
        $status = isset($_GET['status'])?$_GET['status']:'';
        $input=array();
        $input['where']=array('author_id'=>$account['id']);
        
        if($bds_id!=""){
            $input['where']=array('author_id'=>$account['id'],'id'=>$bds_id);
        }else{
                $input['where']=array('author_id'=>$account['id'],'create_time>='=>strtotime($start_date), 'create_time<='=>strtotime($end_date));
                if($status!=""){
                    switch($status) {
                        //status==0
                        case 'hien-thi':
                            $input['where']=array('author_id'=>$account['id'],'create_time>='=>strtotime($start_date), 'create_time<='=>strtotime($end_date),'status'=>1);
                            break;
                        case 'bi-tat':
                            $input['where']=array('author_id'=>$account['id'],'create_time>='=>strtotime($start_date), 'create_time<='=>strtotime($end_date),'status'=>-1);
                            break;
                        case 'het-han':
                            $input['where']=array('author_id'=>$account['id'],'create_time>='=>strtotime($start_date), 'create_time<='=>strtotime($end_date),'exp_time'<time());
                            break;
                    }
                }
        }
        
        //phan trang
        $limit=10;
        $total=$this->M_productions->get_total($input);
        $total_page=ceil($total/$limit);
        $start=($page-1)*$limit;
        $input['limit']=array($limit,$start);
        $list=$this->M_productions->get_list($input);
        $link=base_url()."quan-ly-tin";
        $data=array(
            'title'=>"Quản lý tin đã đăng- Trang thông tin mua bán, cho thuê nhà đất tại Việt Nam",
            'description'=>"www.batdongsanflan.com  website đăng tin mua bán rao vặt cho thuê bất động sản, nhà đất tại Việt Nam",
            'page'=>'user/productions',
            'total'=>$total,
            'pagination'=>$this->phan_trang($link,$total_page,$page),
            'list'=>$list
        );
        $this->load->view('site/master-page',$data);
    }
    
    public function edit($id=0){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        $account=$this->session->userdata('account');
        $item=$this->M_productions->get_item($id);
        if(!$item){
            $msg_post=array(
                    'type'=>'danger',
                    'msg'=>'<strong><i class="fa fa-check"></i> Thất bại! </strong> Tin này không tồn tại',
                );
                $this->session->set_flashdata('msg_post',$msg_post);
                redirect(base_url());
        }
        if(!$this->check_user_production($id)){
            $this->_msg_admin("warning", "Bạn không có quyền với tin này");
            redirect(base_url()."quan-ly-tin.html");
        }
        $msg_post=array();
        $this->form_validation->set_rules('groups_type','Loại bất động sản','required|xss_clean');
        $this->form_validation->set_rules('groups_code','Nhóm bất động sản','required|xss_clean'); 
        $this->form_validation->set_rules('cities','Tỉnh/ Thành phố','required|xss_clean');
        $this->form_validation->set_rules('districts','Quận / Huyện','required|xss_clean');
        
        $this->form_validation->set_rules('title','Tiêu đề','required|xss_clean');
       
        $this->form_validation->set_rules('content','Nội dung','required|xss_clean');
        
        $this->form_validation->set_rules('units','Đơn vị','required|xss_clean');
        
        $this->form_validation->set_rules('frontside','Mặt tiền','numeric|xss_clean');
        $this->form_validation->set_rules('backside','Mặt sau','numeric|xss_clean');
        $this->form_validation->set_rules('floor','Số tầng','numeric|xss_clean');
        $this->form_validation->set_rules('room','Số phòng','numeric|xss_clean');
        $this->form_validation->set_rules('toilet','Số toilet','numeric|xss_clean');
        
        $this->form_validation->set_rules('author_name','Họ và tên','required|xss_clean');
        $this->form_validation->set_rules('author_email','Email','required|xss_clean');
        $this->form_validation->set_rules('author_phone','Điện thoại','required|xss_clean');
        $this->form_validation->set_rules('author_address','Địa chỉ người đăng','required|xss_clean');
        if($this->form_validation->run()){
            $groups_type=$this->input->post("groups_type");
            $groups_code=$this->input->post('groups_code');
            $cities_code=$this->input->post('cities');
            $districts_code=$this->input->post('districts');
            $wards_code=$this->input->post('wards');
            $projects_code=$this->input->post('projects');
            $streets_code=$this->input->post('streets');
            $content=trim($this->input->post("content"));
            $title=trim($this->input->post("title"));
            $price=$this->input->post('price');
            $units_code=$this->input->post('units');
            $acreage=$this->input->post('acreage');
            $directions_code=$this->input->post('directions');
            $room=$this->input->post('room');
            $frontside=$this->input->post('frontside');
            $backside=$this->input->post('backside');
            $toilet=$this->input->post('toilet');
            $floor=$this->input->post('floor');
            $address=$this->input->post('address');
            $public_time=$this->input->post('public_time');
            $exp_time=$this->input->post('exp_time');
            $path="asset/public/upload/";

            $author_address=$this->input->post('author_address');
            $author_email=$this->input->post('author_email');
            $author_phone=$this->input->post('author_phone');
            $author_name=$this->input->post('author_name');
            $unit=$this->M_units->get_item_code($units_code);
            $gia_tri=0;
            if($unit!=false){
                $gia_tri=$price*$unit->he_so;
                if($unit->he_nhan!=0){
                    $gia_tri*=$acreage;
                }
            }
            $image=$_FILES;
            $address_slug="";
            $address_title="";
            if($projects_code!=0){
                $tmp1=$this->M_projects->get_item_code($projects_code);
                $address_slug=$tmp1->slug;
                $address_title=" tại ".$tmp1->type.' '.$tmp1->name;
            }else{
                if($streets_code!=0){
                    $tmp1=$this->M_streets->get_item_code($streets_code);
                    $address_slug=$tmp1->slug;
                     $address_title=" tại ".$tmp1->type.' '.$tmp1->name;
                }else{
                    if($wards_code!=0){
                        $tmp1=$this->M_wards->get_item_code($wards_code);
                         $address_slug=$tmp1->slug;
                          $address_title=" tại ".$tmp1->type.' '.$tmp1->name;
                    }
                }
            }
            if($address_slug==""){
                $district=$this->M_districts->get_item_code($districts_code);
                $address_slug=$district->slug;
                $address_title=" tại ".$district->type.' '.$district->name;
            }
            $group=$this->M_groups->get_item_slug($groups_code);
            $address_slug=$group->slug.'-'.$address_slug;
            $address_title=$group->title.' '.$address_title;
            $tmp=array(
                    //Thoong tin co ban
                    'groups_type'=>$groups_type,
                    'groups_code'=>$groups_code,
                    'cities_code'=>$cities_code,
                    'districts_code'=>$districts_code,
                    'wards_code'=>$wards_code,
                    'projects_code'=>$projects_code,
                    'streets_code'=>$streets_code,
                    'address'=>  trim($address),
                    'address_slug'=>$address_slug,
                    'address_title'=>$address_title,
                    //Thoong tin mo ta
                    
                    'price'=>trim($price),
                    'gia_tri'=>$gia_tri,
                    'units_code'=>trim($units_code),
                    'acreage'=>  trim($acreage),
                    'directions_code'=>$directions_code,
                    'room'=>trim($room),
                    'frontside'=>trim($frontside),
                    'backside'=>trim($backside),
                    'toilet'=>trim($toilet),
                    'floor'=>trim($floor),
                    //Thong tin bai viet
                    'title'=>$title,
                    'slug'=>$this->__to_slug($title),
                    'content'=>trim($content),

                    'create_time'=>time(),
                    'update_time'=>time(),
                    'public_time'=>strtotime($public_time),
                    'exp_time'=>strtotime($exp_time),
                    //Author
                    'author_address'=>$author_address,
                    'author_phone'=>$author_phone,
                    'author_name'=>$author_name,
                    'author_email'=>$author_email,
                    'author_id'=>$account['id']
                    //
            );
            $production_id=$this->M_productions->update($id,$tmp);
            $thumbnail="";
            if($production_id){
                if(isset($_FILES)){
                    $num=count($_FILES);
                    $j=0;
                    for($i=1;$i<=$num;$i++){
                        if($_FILES['image_'.$i]['error']!=0){
                            continue;
                        }
                        if($_FILES['image_'.$i]['type'] === "image/jpeg" || $_FILES['image_'.$i]['type']=== "image/png" || $_FILES['image_'.$i]['type'] === "image/gif"){
                            $name="anh_bat_dong_san_".$j."_".time();
                            switch ($_FILES['image_'.$i]['type']){
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
                            
                            if(move_uploaded_file($_FILES['image_'.$i]['tmp_name'],$path.$name)){
                                
                                $image_item=$this->M_images->get_item_rule(array('production_id'=>$id,'vi_tri'=>$i));
                                if(!$image_item){
                                    $tmp_image=array(
                                        'name'=>$name,
                                        'create_time'=>time(),
                                        'size'=>$_FILES['image_'.$i]['size'],
                                        'vi_tri'=>$i,
                                        'production_id'=>$id
                                    );
                                    $this->M_images->create($tmp_image);
                                }else{
                                    $tmp_image=array(
                                        'name'=>$name,
                                        'create_time'=>time(),
                                        'size'=>$_FILES['image_'.$i]['size'],
                                    );
                                    $this->M_images->update($image_item->id,$tmp_image);
                                }

                                if($i==1){
                                    $thumbnail=$name;
                                    if($item->thumbnail!="thumbnail.gif"){
                                        unlink($path."thumbnail/".$item->thumbnail);
                                    }
                                    $this->resize($name,$path);
                                    $this->M_productions->update($id,array('thumbnail'=>$thumbnail));
                                }

                            }
                        }
                    }
                }
                
                $msg_post=array(
                    'type'=>'success',
                    'msg'=>'<strong><i class="fa fa-check"></i> Thành công! </strong> Chúc mừng bạn đã cập nhật tin thành công.',
                );
                $this->session->set_flashdata('msg_post',$msg_post);
                redirect(base_url().'quan-ly-tin.html');
            }
            else{

                $msg_post=array(
                    'type'=>'danger',
                    'msg'=>'<strong><i class="fa fa-remove"></i>  Không thành công! </strong> Bạn vui lòng kiểm tra lại các thông báo lỗi và khắc phục.',
                );
                $this->session->set_flashdata('msg_post',$msg_post);
            } 
        }
        $input=array();
        $input['where']=array('production_id'=>$id);
        $input['order']=array('vi_tri','asc');
        $images=$this->M_images->get_list($input);
        
        $data=array(
            'title'=>"Chỉnh sửa tin bất động sản",
            'description'=>"Đăng tin mua bán, cho thuê bất động sản nhanh chóng",
            'page'=>'user/production-edit',
            'item'=>$item,
            'images'=>$images
        );
        $this->load->view("site/master-page",$data);
    }
    public function login()
	{
        if($this->_check_login()){
                if(!$this->_check_account()){
                    $this->unset_account();
                }else{
                    $this->_msg_admin("success"," Bạn đã đăng nhập");
                    redirect(base_url()."quan-ly-tin.html");
                }
            }
         $this->form_validation->set_rules('email','Email','required|xss_clean');
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
                        redirect(base_url()."quan-ly-tin.html");
                    }
                }

         }
            $data=array(
                'title'=>"Đăng nhập - Trang thông tin mua bán, cho thuê nhà đất tại Việt Nam",
                'description'=>"www.batdongsanflan.com  website đăng tin mua bán rao vặt cho thuê bất động sản, nhà đất tại Việt Nam",
                'page'=>'login',
                
            );
            $this->load->view('site/master-page',$data);
	}
    public function reset_pass(){
        $captcha_status="";
        $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
        if($this->form_validation->run()){
            $email=trim($this->input->post('email'));
            $site_key_post    = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
            $check_captcha=false;
            $site_key_post="12";
            if($site_key_post!=""){
                //if($this->check_captcha($site_key_post)==true){
                if(1){
                    $item=$this->M_users->get_item_rule(array('email'=>$email));
                    if(empty($item)){
                        $this->_msg_admin("warning", "Người dùng này không tồn tại");
                        
                    }else{
                        $time=time();
                        $password=md5($time);
                        $content="Chào quý khách! <br><br> Chúng tôi nhận được một yêu cầu thay đổi mật khẩu vào lúc ".date('H:i d-m-Y',time())." . Dưới đây là mật khẩu mới của quý khách. Quý khách vui lòng ghi nhớ và lưu trữ lại để có thể truy cập vào website http://batdongsanflan.com.vn. <br><br> Mật khẩu mới: ".$time." <br><br> Trân trọng cảm ơn quý khách!
                        ";
                        $to=$email;
                        $header="[BĐS] Thông tin mật khẩu mới - ".date('H:i d-m-Y',time());
                        if($this->M_users->update($item->id,array('password'=>$password))){
                            $this->sendMail($to,$header,$content);
                            $this->_msg_admin("success", "Thay đổi mật khẩu thành công. Quý khách vui lòng kiểm tra email.");
                        }
                    }
                }else{
                    $captcha_status="Sai mã xác thực";
                }
            }else{
                $captcha_status="Bạn chưa nhập mã xác thực";
            }
        }
        $data=array(
            'title'=>"Lấy lại thông tin tài khoản",
            'description'=>"www.batdongsanflan.com  website đăng tin mua bán rao vặt cho thuê bất động sản, nhà đất tại Việt Nam",
            'page'=>'reset-pass',
            'captcha_status'=>$captcha_status
        );
        $this->load->view('site/master-page',$data);
    }
    public function register(){
        $captcha_status="";
         $this->form_validation->set_rules('full_name','Họ và tên','required|xss_clean');
        $this->form_validation->set_rules('password','Mật khẩu','required|xss_clean');
        $this->form_validation->set_rules('password_again','Xác nhận mật khẩu','required|xss_clean|matches[password]');
        $this->form_validation->set_rules('phone','Điện thoại','required|xss_clean');
        $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
        $this->form_validation->set_rules('address','Địa chỉ','xss_clean');
        $this->form_validation->set_rules('zalo','zalo','xss_clean');
        $this->form_validation->set_rules('facebook','Facebook','xss_clean');
        $this->form_validation->set_rules('skype','Skype','xss_clean');
        
        if($this->form_validation->run()){
            $password=trim($this->input->post('password'));

            $full_name=trim($this->input->post('full_name'));
            $role=trim($this->input->post('role'));
            $phone=trim($this->input->post('phone'));
            $email=trim($this->input->post('email'));
            $address=trim($this->input->post('address'));
            $facebook=trim($this->input->post('facebook'));
            $skype=trim($this->input->post('skype'));
            $zalo=trim($this->input->post('zalo'));
            $site_key_post    = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
            $check_captcha=false;
            $site_key_post="12";
            if($site_key_post!=""){
                //if($this->check_captcha($site_key_post)==true){
                if(1){
                    if($this->M_users->check_exists(array('email'=>$email)) || $this->M_users->check_exists(array('phone'=>$phone))){
                        $this->_msg_admin("warning", "Vui lòng sử dụng email hoặc số điện thoại khác");
                    }else{
                        $password_1=$password;
                        $tmp=array(
                            'password'=>md5($password),
                            'full_name'=>$full_name,
                            'role'=>'member',
                            'phone'=>$phone,
                            'email'=>$email,
                            'address'=>$address,
                            'create_time'=>time(),
                            'facebook'=>$facebook,
                            'skype'=>$skype,
                            'zalo'=>$zalo,
                            'status'=>1
                        );
                        if($this->M_users->create($tmp)){
                            $to=$email;
                            $header="[BĐS] Đăng ký tài khoản thành công - ".date('H:i d-m-Y',time());
                            $content="Chúc mừng bạn đã đăng ký tài khoản thành công. <br><br>
                            Thông tin đăng nhập của bạn là: <br><br>
                            Tài khoản: ".$email."<br><br>
                            Mật khẩu: ".$password_1." <br><br>
                            Quý khách vui lòng giữ kín thông tin đăng nhập. <br><br>
                            Trân trọng cảm ơn.
                            ";
                            $this->sendMail($to,$header,$content);
                            $this->_msg_admin("success", "Chúc mừng bạn đã đăng ký thành công!");
                            redirect(base_url()."dang-nhap.html");
                        }else{
                            $this->_msg_admin("danger", "Không lưu trữ được");
                        }
                    }
                 }else{
                     $captcha_status="Sai mã captcha";
                 }
            }else{
                 $captcha_status="Bạn chưa nhập mã captcha";
            }
            
        }
        $data=array(
            'title'=>"Đăng ký tài khoản mới - Trang thông tin mua bán, cho thuê nhà đất tại Việt Nam",
            'description'=>"www.batdongsanflan.com  website đăng tin mua bán rao vặt cho thuê bất động sản, nhà đất tại Việt Nam",
            'page'=>'user/register',
            'captcha_status'=>$captcha_status
        );
        $this->load->view('site/master-page',$data);
    }
    public function info(){
        if(!$this->_check_login()){
           $this->_msg_admin("warning", "Bạn cần đăng nhập để truy cập");
           redirect(base_url());
        }
        $account=$this->session->userdata('account');
        $item=$this->M_users->get_item($account['id']);
        if(!$item){
            $this->_msg_admin("warning", "Không tìm thấy người dùng");
        }
         $this->form_validation->set_rules('full_name','Họ và tên','required|xss_clean');
        $this->form_validation->set_rules('password','Mật khẩu','required|xss_clean');
        $this->form_validation->set_rules('password_again','Xác nhận mật khẩu','required|xss_clean|matches[password]');
        $this->form_validation->set_rules('phone','Điện thoại','required|xss_clean');
        $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
        $this->form_validation->set_rules('address','Địa chỉ','xss_clean');
        $this->form_validation->set_rules('zalo','zalo','xss_clean');
        $this->form_validation->set_rules('facebook','Facebook','xss_clean');
        $this->form_validation->set_rules('skype','Skype','xss_clean');
        if($this->form_validation->run()){
            $password=trim($this->input->post('password'));
            $full_name=trim($this->input->post('full_name'));
            $role=trim($this->input->post('role'));
            $phone=trim($this->input->post('phone'));
            $email=trim($this->input->post('email'));
            $address=trim($this->input->post('address'));
            $facebook=trim($this->input->post('facebook'));

            if($password!=$item->password){
                $password=md5($password);
            }
            $skype=trim($this->input->post('skype'));
            $zalo=trim($this->input->post('zalo'));
            if(($email!=$item->email && $this->M_users->check_exists(array('email'=>$email))) || ($email!=$item->email && $this->M_users->check_exists(array('phone'=>$phone)))){
                $this->_msg_admin("warning", "Vui lòng sử dụng email hoặc số điện thoại khác");
            }else{
                $tmp=array(
                    'password'=>$password,
                    'full_name'=>$full_name,
                    'role'=>'member',
                    'phone'=>$phone,
                    'email'=>$email,
                    'address'=>$address,
                    'create_time'=>time(),
                    'facebook'=>$facebook,
                    'skype'=>$skype,
                    'zalo'=>$zalo,
                );
                if($this->M_users->update($item->id,$tmp)){
                    $this->_msg_admin("success", "Cập nhật thông tin thành công!");
                    redirect(base_url()."quan-ly-tin.html");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=array(
            'title'=>"Cập nhật thông tin tài khoản - Trang thông tin mua bán, cho thuê nhà đất tại Việt Nam",
            'description'=>"www.batdongsanflan.com  website đăng tin mua bán rao vặt cho thuê bất động sản, nhà đất tại Việt Nam",
            'page'=>'user/info',
            'item'=>$item
        );
        $this->load->view('site/master-page',$data);
    }
    public function sign_out(){
            $this->session->unset_userdata("account");
            $this->_msg_admin("success", "Bạn đã đăng xuất thành công.");
            redirect(base_url()."dang-nhap.html");
        }
        public function unset_account(){
            $this->session->unset_userdata("account");
            redirect(base_url()."dang-nhap.html");
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
        $tmp='<div class="alert alert-'.$type.' alert-admin no-radius">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>'.$tmp.'</strong> '.$str.'.
        </div>';
        $this->session->set_flashdata('msg_admin',$tmp);
    }
    public function check_user_production($id=0){
        if(!$this->_check_login()){
           return false;
        }
        $item=$this->M_productions->get_item($id);
        if(!$item){
            return false;
        }
         $account=$this->session->userdata('account');
         if($account['id']!=$item->author_id){
            return false;
         }
         return true;

    }
     public function logout(){
            $this->session->unset_userdata("account");
            $this->_msg_admin("success", "Bạn đã đăng xuất thành công.");
            redirect(base_url()."dang-nhap.html");
        }
}
