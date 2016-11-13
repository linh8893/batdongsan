<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Categories extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_categories");
        $this->load->model("M_categories");
    }
    public function index(){
        $data=$this->data;
        $input=array();
        $list=$this->M_categories->get_list();
        $data=array(
            'title'=>"Danh sách chuyên mục",
            'template'=>'categories/list',
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
            $group=trim($this->input->post('group'));
            $thumbnail=trim($this->input->post('thumbnail'));
            $description=trim($this->input->post('description'));
            $keywords=trim($this->input->post('keywords'));
            if($this->M_categories->check_exists(array('slug'=>$slug))){
                $this->_msg_admin("warning", "Tiêu đề rút gọn này đã tồn tại");
            }else{
                $tmp=array(
                    'title'=>$title,
                    'slug'=>$slug,
                    'thumbnail'=>$thumbnail,
                    'description'=>$description,
                    'keywords'=>$keywords,
                    'create_time'=>time(),
                    'update_time'=>time(),
                    'group'=>$group,
                    'status'=>1,
                );
                if($this->M_categories->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/categories");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $input=array();
        $input['where']=array('status'=>1);
        $categories=$this->M_categories->get_list($input);
        $data=$this->data;
        $data=array(
            'title'=>"Thêm chuyên mục mới",
            'template'=>'categories/create',
            'categories'=>$categories
        );
        $this->load->view('admin/master-page',$data);
    }
    public function edit($id=0){
        $item=$this->M_categories->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/categories");
        }
        $account=$this->session->userdata("account");
        $this->form_validation->set_rules('title','Tiêu đề ','required|xss_clean');
        $this->form_validation->set_rules('slug','Tiêu đề rút gọn','required|xss_clean');  
        if($this->form_validation->run()){
            $title=trim($this->input->post('title'));;
            $slug=trim($this->input->post('slug'));
            $thumbnail=trim($this->input->post('thumbnail'));
             $group=trim($this->input->post('group'));
            $description=trim($this->input->post('description'));
            
            $keywords=trim($this->input->post('keywords'));
            if($slug!=$item->slug && $this->M_categories->check_exists(array('slug'=>$slug))){
                $this->_msg_admin("warning", "Tiêu đề rút gọn này đã tồn tại");
            }else{
                $tmp=array(
                    'title'=>$title,
                    'slug'=>$slug,
                    'thumbnail'=>$thumbnail,
                    'group'=>$group,
                    'description'=>$description,
                    'keywords'=>$keywords,
                   
                    'update_time'=>time(),
                );
                if($this->M_categories->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/categories");
                }else{
                    $this->_msg_admin("danger", "Không lưu trữ được");
                }
            }
        }
        $data=$this->data; 
        $data=array(
            'title'=>"Cập nhật chuyên mục",
            'template'=>'categories/edit',
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    
    public function switch_status($id=0){
        $item=$this->M_categories->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_categories->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/categories");
    }
    public function delete_all($id=0){
        if($this->M_categories->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_categories->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/categories");
    }
    
}