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
        $this->load->model("M_productions");
        $this->load->model("M_groups");
        $this->load->model("M_cities");
    }
    public function index(){
        if(isset($_POST['delete'])){
            $list_delete=isset($_POST['item'])?$_POST['item']:array();
            $tmp_s=0;
            $tmp_e=0;
            foreach ($list_delete as $row) {
                $item=$this->M_productions->get_item($row);
                if(!$item){
                    $tmp_e++;
                    continue;
                }
                if($this->M_productions->delete($row)){
                    $tmp_s++;
                    $path="asset/public/upload/";
                    if($item->thumbnail!="thumbnail.gif"){
                        unlink($path."thumbnail/".$item->thumbnail);
                    }
                    $input=array();
                    $input['where']=array('production_id'=>row);
                    $images=$this->M_images->get_list($input);
                    foreach ($images as $row1){
                        unlink($path.$row1->name);
                    }
                    $this->M_images->del_rule($input['where']);
                }
            }
            $str="Đã xóa thành công: ".$tmp_s." tin";
            if($tmp_e>0){
                $str.=" - Không thành công: ".$tmp_e." tin";
            }
            $this->_msg_admin("success", $str);
        }
        $data=$this->data;
        $input=array();
        $input['select']="id,title";
        $list=$this->M_productions->get_list();
        $data=array(
            'title'=>"Danh sách tin bất động sản",
            'template'=>'productions/list',
            'list'=>$list,
        );
        $this->load->view('admin/master-page',$data);
    }
   
    public function switch_status($id=0){
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
        redirect(base_url()."admin/productions");
    }
    public function delete_all($id=0){
        if($this->M_posts->delete($id)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_item($id=0){
        $item=$this->M_productions->get_item($id);
        if(!$item){
            $this->_msg_admin("warning", "Tin nay khong ton tai");
            redirect(base_url()."admin/productions");
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
        redirect(base_url()."admin/productions");
    }
 
}