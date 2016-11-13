<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function index()
	{
			$seo=$this->M_seo->get_item_slug('trang-chu');
			$input=array();
			$date=strtotime("23:59 ".date('d-m-Y',time()));
			$input['where']=array('status'=>1,'public_time<='=>$date,'exp_time>='=>$date);
			$input['limit']=array(20,0);
			$input['order']=array('public_time','desc');
			$list=$this->M_productions->get_list($input);
            $data=array(
                'title'=>$seo->title,
                'description'=>$seo->description,
                'keywords'=>$seo->keywords,
                'image'=>$seo->image,
                'list'=>$list,
                'page'=>'home',
            );
            $this->load->view('site/master-page',$data);
	}
}
