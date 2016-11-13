<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("BASEPATH") OR exit("No Access");
class Ajax extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function change_cities($code=0){
        $input=array();
        $input['where']=array('cities_code'=>$code,'status'=>1);
        $input['order']=array('order_index','ASC');
        $list=$this->M_districts->get_list($input);
        echo '<option  value="" data-slug="">-- Chọn quận / huyện --</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->code.'" data-slug="'.$row->slug.'" >'.$row->name.'</option>';
        }
    }
    public function change_districts_wards($code=0){
        $input=array();
        $input['where']=array('districts_code'=>$code,'status'=>1);
        $input['order']=array('order_index','ASC');
        $list=$this->M_wards->get_list($input);
        echo '<option  value="" data-slug="" >-- Chọn xã / phường --</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->code.'" data-slug="'.$row->slug.'" >'.$row->name.'</option>';
        }
    }
    public function change_districts_streets($code=0){
        $input=array();
        $input['where']=array('districts_code'=>$code,'status'=>1);
        $input['order']=array('order_index','ASC');
        $list=$this->M_streets->get_list($input);
        echo '<option  value=""data-slug="" >-- Chọn đường / phố --</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->code.'" data-slug="'.$row->slug.'" >'.$row->name.'</option>';
        }
    }
    public function change_districts_projects($code=0){
        $input=array();
        $input['where']=array('districts_code'=>$code,'status'=>1);
        $input['order']=array('order_index','ASC');
        $list=$this->M_projects->get_list($input);
        echo '<option  value="" data-slug="" >-- Chọn dự án --</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->code.'" data-slug="'.$row->slug.'" >'.$row->name.'</option>';
        }
    }
    
    public function change_groups_type($groups_type=0){
        $this->load->model("M_groups");
        $input=array();
        $input['select']="id,slug,title";
        $input['order']=array("id",'asc');
        $input['where']=array('type'=>$groups_type,'status'=>1);
        $input['order']=array('order_index','ASC');
        $list=$this->M_groups->get_list($input);
        echo '<option  value="" data-slug="" >-- Chọn loại nhà đất --</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->slug.'" data-slug="'.$row->slug.'" >'.$row->title.'</option>';
        }
    }
     public function change_groups_units($groups_type=0){
        $input=array();
        $input['order']=array("id",'asc');
        $input['where']=array('groups_type'=>$groups_type,'status'=>1);
         $input['order']=array('code','ASC');
        $list=$this->M_units->get_list($input);
        echo '<option  value="" data-slug="" >-- Chọn đơn vị --</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->code.'" data-slug="'.$row->slug.'" >'.$row->name.'</option>';
        }
    }
    public function change_groups_prices($groups_type=0){
        $input=array();
        $input['order']=array("id",'asc');
        $input['where']=array('groups_type'=>$groups_type,'status'=>1);
         $input['order']=array('code','ASC');
        $list=$this->M_prices->get_list($input);
        echo '<option  value="-1"  >-- Mức giá--</option>';
        foreach ($list as $row){
            echo '<option  value="'.$row->code.'" >'.$row->name.'</option>';
        }
    }
}