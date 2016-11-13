<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Seo extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_seo");
    }
    public function index(){
        $data=$this->data;
        $input=array();
        $list=$this->M_seo->get_list();
        $data=array(
            'title'=>"Danh sách page meta",
            'template'=>'seo/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
    public function create(){
        $account=$this->session->userdata("account");
        $this->form_validation->set_rules('title','Tiêu đề ','required|xss_clean');
        $this->form_validation->set_rules('slug','Tiêu đề rút gọn','required|xss_clean');  
        if($this->form_validation->run()){
            $title=trim($this->input->post('title'));;
            $slug=trim($this->input->post('slug'));
            $keywords=trim($this->input->post('keywords'));
            $description=trim($this->input->post('description'));
            if($this->M_seo->check_exists(array('slug'=>$slug))){
                $this->_msg_admin("warning", "Tiêu đề rút gọn này đã tồn tại");
            }else{
                $tmp=array(
                    'title'=>$title,
                    'slug'=>$slug,
                    'image'=>trim($this->input->post('thumbnail')),
                    'description'=>$description,
                    'keywords'=>$keywords,
                );
                if($this->M_seo->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/seo");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data;
        $data=array(
            'title'=>"Thêm meta trang mới",
            'template'=>'seo/create',
        );
        $this->load->view('admin/master-page',$data);
    }
    public function edit($id=0){
        $item=$this->M_seo->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/seo");
        }
        $account=$this->session->userdata("account");
        $this->form_validation->set_rules('title','Tiêu đề ','required|xss_clean');
        $this->form_validation->set_rules('slug','Tiêu đề rút gọn','required|xss_clean');  
        if($this->form_validation->run()){
            $title=trim($this->input->post('title'));;
            $slug=trim($this->input->post('slug'));
            //$type=trim($this->input->post('type'));;
            $keywords=trim($this->input->post('keywords'));
            $description=trim($this->input->post('description'));
            if($slug!=$item->slug && $this->M_seo->check_exists(array('slug'=>$slug))){
                $this->_msg_admin("warning", "Tiêu đề rút gọn này đã tồn tại");
            }else{
                $tmp=array(
                    'title'=>$title,
                    'slug'=>$slug,
                    'description'=>$description,
                    'keywords'=>$keywords,
                    'image'=>trim($this->input->post('thumbnail')),
                );
                if($this->M_seo->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/seo");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data; 
        $data=array(
            'title'=>"Cập nhật meta page",
            'template'=>'seo/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    
    public function switch_status($id=0){
        $item=$this->M_seo->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_seo->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/seo");
    }
    public function delete_all($id=0){
        if($this->M_seo->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_seo->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/seo");
    }
    
}