<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Cities extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_cities");
        $this->session->set_flashdata("msg_local","Mã địa giới tỉnh/ thành phố trấn gồm 2 ký tự theo quy định");
    }
    public function index(){
        if(isset($_POST['delete'])){
            $list_delete=isset($_POST['item'])?$_POST['item']:array();
            foreach ($list_delete as $row) {
                $this->M_cities->delete($row);
            }
        }
        $input1=array();
        $input1['order']=array('order_index','ASC');
        $data=$this->data;
        $list=$this->M_cities->get_list($input1);
        $data=array(
            'title'=>"Danh sách tỉnh / thành phố",
            'template'=>'city/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function create(){
        $this->form_validation->set_rules('name','Tên vai trò & quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('type','Tiền tố','required|xss_clean');
        $this->form_validation->set_rules('slug','Tên rút gọn','required|xss_clean');
        $this->form_validation->set_rules('code','code','required|min_length[2]|max_length[2]|xss_clean');
        $this->form_validation->set_rules('order_index','Thứ tự','is_numeric|xss_clean');
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));
            $type=trim($this->input->post('type'));
            $code=trim($this->input->post('code'));
            $slug=trim($this->input->post('slug'));
            $order_index=trim($this->input->post('order_index'));
            if($this->M_cities->check_exists_rule($code,$slug)){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'type'=>$type,
                    'slug'=>$slug,
                    'code'=>$code,
                    'order_index'=>$order_index,
                    'status'=>1
                );
                
                if($this->M_cities->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/cities");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
                print_r($tmp);
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm tỉnh / thành phố mới",
            'template'=>'city/create',
            'order_index'=>$this->M_cities->get_order_index()
        );
        $this->load->view('admin/master-page',$data);
    }
    public function edit($id=0){
        $item=$this->M_cities->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/cities");
        }
         $this->form_validation->set_rules('slug','Tên rút gọn','required|xss_clean');
        
        $this->form_validation->set_rules('code','code','required|min_length[2]|max_length[2]|xss_clean');
       $this->form_validation->set_rules('name','Tên vai trò & quyền hạn','required|xss_clean');
        $this->form_validation->set_rules('type','Tiền tố','required|xss_clean');
        $this->form_validation->set_rules('order_index','Thứ tự','is_numeric|xss_clean');
        if($this->form_validation->run()){
            $name=trim($this->input->post('name'));
            $type=trim($this->input->post('type'));
            $code=trim($this->input->post('code'));
            $slug=trim($this->input->post('slug'));
            $order_index=trim($this->input->post('order_index'));
            if( ($slug!=$item->slug || $code!=$item->code) && $this->M_cities->check_exists_rule($code,$slug)){
                $this->_msg_admin("warning", "Dữ liệu này đã tồn tại trong hệ thống");
            }else{
                $tmp=array(
                    'name'=>$name,
                    'type'=>$type,
                    'slug'=>$slug,
                    'code'=>$code,
                    'order_index'=>$order_index,
                );
                if($this->M_cities->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/cities");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
                print_r($tmp);
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Chỉnh sửa: ".$item->type." ".$item->name,
            'template'=>'city/edit',
            'order_index'=>$this->M_cities->get_order_index(),
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    public function switch_status($id=0){
        $item=$this->M_cities->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_cities->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/cities");
    }
    public function delete_list(){

        //$this->del_rule($where);
    }
    public function delete_all($id=0){
        if($this->M_cities->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_cities->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/cities");
    }
    
}