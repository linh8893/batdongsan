<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Streets extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_districts");
        $this->load->model("M_cities");
        $this->load->model("M_wards");
        $this->load->model("M_streets");
        $this->session->set_flashdata("msg_local","Mã đường, phố  gồm 5 ký tự theo quy định");
    }
    public function index(){
        if(isset($_POST['delete'])){
            $list_delete=isset($_POST['item'])?$_POST['item']:array();
            foreach ($list_delete as $row) {
                $this->M_streets->delete($row);
            }
        }
        $data=$this->data;
        $list=$this->M_streets->get_list();
        $data=array(
            'title'=>"Danh sách đường / phố",
            'template'=>'streets/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
    public function create(){
        
        $this->form_validation->set_rules('name','Tên vai trò & quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('type','Tiền tố','required|xss_clean');
        $this->form_validation->set_rules('order_index','Thứ tự','is_numeric|xss_clean');
        $this->form_validation->set_rules('cities_code','Mã tỉnh / thành phố','xss_clean');
        $this->form_validation->set_rules('districts_code','Mã quận/ huyện','xss_clean');
        $this->form_validation->set_rules('slug','Tên rút gọn','required|xss_clean');
        $this->form_validation->set_rules('code','code','required|min_length[5]|max_length[5]|xss_clean');
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));
            $type=trim($this->input->post('type'));
            $cities_code=trim($this->input->post('cities_code'));
            $districts_code=trim($this->input->post('districts_code'));
            $order_index=trim($this->input->post('order_index'));
            $code=trim($this->input->post('code'));
            $slug=trim($this->input->post('slug'));
           
            if($type=="Đường"){
                $slug="duong-".$slug;
            }else{
                $slug="pho-".$slug;
            }
            if($this->M_streets->check_exists_rule($code,$slug)){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'type'=>$type,
                    'cities_code'=>$cities_code,
                    'districts_code'=>$districts_code,
                    'order_index'=>$order_index,
                    'slug'=>$slug,
                    'code'=>$code,
                    'status'=>1
                    
                );
                
                if($this->M_streets->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/streets");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $cities=$this->M_cities->get_list();
        $districts=array();
        if(isset($cities[0])){
           $input=array();
           $input['where']=array('cities_code'=>$cities[0]->code);
           $districts =$this->M_districts->get_list($input);
        }
        if(set_value("cities_code")!=0){
            $input=array();
            $input['where']=array('cities_code'=>set_value("cities_code"));
            $districts =$this->M_districts->get_list($input);
        }
        $data=array(
            'title'=>"Thêm đường / phố mới",
            'template'=>'streets/create',
            'order_index'=>$this->M_streets->get_order_index(),
            'cities'=>$cities,
            'districts'=>$districts
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function edit($id=0){
        $item=$this->M_streets->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/streets");
        }
        $this->form_validation->set_rules('name','Tên vai trò & quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('type','Tiền tố','required|xss_clean');
        $this->form_validation->set_rules('order_index','Thứ tự','is_numeric|xss_clean');
        $this->form_validation->set_rules('cities_code','Mã tỉnh / thành phố','xss_clean');
        $this->form_validation->set_rules('districts_code','Mã quận/ huyện','xss_clean');
        $this->form_validation->set_rules('slug','Tên rút gọn','required|xss_clean');
        $this->form_validation->set_rules('code','code','required|min_length[5]|max_length[5]|xss_clean');
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));
            $type=trim($this->input->post('type'));
            $cities_code=trim($this->input->post('cities_code'));
            $districts_code=trim($this->input->post('districts_code'));
            $order_index=trim($this->input->post('order_index'));
            $code=trim($this->input->post('code'));
            $slug=trim($this->input->post('slug'));
            if($type!=$item->type || $name!=$item->name){
                $slug=str_replace("duong-", "", $slug);
                $slug=str_replace("pho-", "", $slug);
                if($type=="Đường"){
                    $slug="duong-".$slug;
                }else{
                    $slug="pho-".$slug;
                }
            }
            if( ($slug!=$item->slug || $code!=$item->code) && $this->M_cities->check_exists_rule($code,$slug)){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'type'=>$type,
                    'cities_code'=>$cities_code,
                    'districts_code'=>$districts_code,
                    'order_index'=>$order_index,
                    'slug'=>$slug,
                    'code'=>$code, 
                );
                if($this->M_streets->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn cập nhật thêm thành công!");
                    redirect(base_url()."admin/streets");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $cities=$this->M_cities->get_list();
        $districts=array();
        if(isset($cities[0])){
           $input=array();
           $input['where']=array('cities_code'=>$cities[0]->code);
           $districts =$this->M_districts->get_list($input);
        }
        if($item->cities_code!=0){
            $input=array();
            $input['where']=array('cities_code'=>$item->cities_code);
            $districts =$this->M_districts->get_list($input);
        }
        if(set_value("cities_code")!=0){
            $input=array();
            $input['where']=array('cities_code'=>set_value("cities_code"));
            $districts =$this->M_districts->get_list($input);
        }
        $data=array(
            'title'=>"Chỉnh sửa: ".$item->type." ".$item->name,
            'template'=>'streets/edit',
            'order_index'=>$this->M_streets->get_order_index(),
            'cities'=>$cities,
            'districts'=>$districts,
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_streets->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_streets->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/streets");
    }
    public function delete_all($id=0){
        if($this->M_streets->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_streets->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/streets");
    }
    
}