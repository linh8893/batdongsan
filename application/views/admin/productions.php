<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Productions extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_production");
    }
    public function index(){
        $data=$this->data;
        $input=array();
        $input['select']="id,title,create_time,categories_id,status";
        $list=$this->M_posts->get_list();
        $data=array(
            'title'=>"Danh sách bài viết",
            'template'=>'post/list',
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
            $thumbnail=trim($this->input->post('thumbnail'));
            $categories_id=trim($this->input->post('categories_id'));
            $description=trim($this->input->post('description'));
            $content=trim($this->input->post('content'));
            $keywords=trim($this->input->post('keywords'));
            if($this->M_posts->check_exists(array('slug'=>$slug))){
                $this->_msg_admin("warning", "Tiêu đề rút gọn này đã tồn tại");
            }else{
                $tmp=array(
                    'title'=>$title,
                    'slug'=>$slug,
                    'thumbnail'=>$thumbnail,
                    'categories_id'=>$categories_id,
                    'description'=>$description,
                    'keywords'=>$keywords,
                    'content'=>$content,
                    'create_time'=>time(),
                    'update_time'=>time(),
                    'status'=>1,
                    'author'=>$account['id'],
                );
                
                if($this->M_posts->create($tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/posts");
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
            'title'=>"Thêm bài viết mới",
            'template'=>'post/create',
            'categories'=>$categories
        );
        $this->load->view('admin/master-page',$data);
    }
    public function edit($id=0){
        $item=$this->M_posts->get_item($id);
        if(!$item){
             $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
             redirect(base_url()."admin/posts");
        }
        $account=$this->session->userdata("account");
        $this->form_validation->set_rules('title','Tiêu đề ','required|xss_clean');
        $this->form_validation->set_rules('slug','Tiêu đề rút gọn','required|xss_clean');  
        if($this->form_validation->run()){
            $title=trim($this->input->post('title'));;
            $slug=trim($this->input->post('slug'));
            $thumbnail=trim($this->input->post('thumbnail'));
            $categories_id=trim($this->input->post('categories_id'));
            $description=trim($this->input->post('description'));
            $content=trim($this->input->post('content'));
            $keywords=trim($this->input->post('keywords'));
            if($slug!=$item->slug && $this->M_posts->check_exists(array('slug'=>$slug))){
                $this->_msg_admin("warning", "Tiêu đề rút gọn này đã tồn tại");
            }else{
                $tmp=array(
                    'title'=>$title,
                    'slug'=>$slug,
                    'thumbnail'=>$thumbnail,
                    'categories_id'=>$categories_id,
                    'description'=>$description,
                    'keywords'=>$keywords,
                    'content'=>$content,
                    'update_time'=>time(),
                );
                
                if($this->M_posts->update($id,$tmp)){
                    $this->_msg_admin("success", "Bạn đã thêm thành công!");
                    redirect(base_url()."admin/posts");
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
            'title'=>"Cập nhật bài viết",
            'template'=>'post/edit',
            'categories'=>$categories,
            'item'=>$item
        );
        $this->load->view('admin/master-page',$data);
    }
    
    public function switch_status($id=0){
        $item=$this->M_posts->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Nội dung này không tồn tại trong hệ thống");
        }else{
            $tmp=array(
                'status'=>-$item->status
            );
            if($this->M_posts->update($id,$tmp)){
                $this->_msg_admin("success", "Cập nhật trạng thái thành công");
            }else{
                 $this->_msg_admin("danger", "Cập nhật trạng thái thất bại");
            }
        }
        redirect(base_url()."admin/posts");
    }
    public function delete_all($id=0){
        if($this->M_posts->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        if($this->M_posts->delete($id)){
             $this->_msg_admin("success", "Xóa thành công");
        }else{
             $this->_msg_admin("danger", "Xóa không thành công");
        }
        redirect(base_url()."admin/posts");
    }
    
}