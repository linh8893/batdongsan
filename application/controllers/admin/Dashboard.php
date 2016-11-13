<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
    }
	public function index()
	{
            $data=$this->data;
            $total_users=$this->M_users->get_total();
            if(!$total_users){
                $total_users=0;
            }
            $this->load->model("M_posts");
            $total_posts=$this->M_posts->get_total();
            if(!$total_posts){
                $total_posts=0;
            }
            $total_productions=$this->M_productions->get_total();
            if(!$total_productions){
                $total_productions=0;
            }
            $input=array();
            $day1=strtotime('00:00 '.date('d-m-Y',time()));
            $day2=strtotime('23:59 '.date('d-m-Y',time()));
            $input['where']=array('create_time>='=>$day1,'create_time<='=>$day2);
            $total_new=$this->M_productions->get_total($input);
            $data=array(
                'title'=>'Tổng quan hệ thống',
                'template'=>'dashboard',
                'script'=>'',
                'style'=>'',
                'total_users'=>$total_users,
                'total_posts'=>$total_posts,
                 'total_productions'=>$total_productions,
                 'total_new'=>$total_new
            );
            $this->load->view('admin/master-page',$data);
	}
}
