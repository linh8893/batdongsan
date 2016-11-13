<?php 

defined("BASEPATH") OR exit("NO ACCESS");

class Posts extends MY_Controller{
    public $limit = 10;
    public function __construct() {
        parent::__construct();
        $this->load->model('M_posts');
        $this->load->model('M_categories');
    }
    public function cam_nang_tu_van($page=1){
        $data_search=array(
            'groups_type'=>1,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
    	$str="select posts.id as id,posts.title as title, posts.slug as slug,posts.thumbnail as thumbnail, categories.slug as categories_slug,posts.description as description, posts.create_time as create_time from posts, categories where posts.status=1 and categories.group='cam-nang-tu-van' and categories.id = posts.categories_id ";

        $total=$this->M_posts->get_total_query($str);
        $limit=$this->limit;
        $total_page=ceil($total/$limit);
        $start=($page-1)*$limit;
        $link=base_url()."cam-nang-tu-van";
        $str.=" order by posts.create_time desc limit ".$start.",".$limit;
    	$list=$this->M_posts->select_query($str);
        $seo=$this->M_seo->get_item_slug('cam-nang-tu-van');
        $data=array(
            'title'=>$seo->title,
            'description'=>$seo->description,
            'keywords'=>$seo->keywords,
            'image'=>$seo->image,
            'page'=>'post-list',
            'data_search'=>$data_search,
            'list'=>$list,
            'pagination'=>$this->phan_trang($link,$total_page,$page)
        );
        $this->load->view("site/master-page",$data);
    }
    public function tin_tuc_du_an($page=1){
         $data_search=array(
            'groups_type'=>1,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
    	$str="select posts.id as id,posts.title as title, posts.slug as slug,posts.thumbnail as thumbnail, categories.slug as categories_slug,posts.description as description, posts.create_time as create_time from posts, categories where  posts.status=1 and categories.slug='tin-tuc-du-an' and  categories.id = posts.categories_id ";
        $total=$this->M_posts->get_total_query($str);
        $limit=$this->limit;
        $total_page=ceil($total/$limit);
        $start=($page-1)*$limit;
        $link=base_url()."tin-tuc-du-an";
        $str.=" order by posts.create_time desc limit ".$start.",".$limit;
    	$list=$this->M_posts->select_query($str);
        $seo=$this->M_seo->get_item_slug('tin-tuc-du-an');
        $data=array(
            'title'=>$seo->title,
            'description'=>$seo->description,
            'keywords'=>$seo->keywords,
            'image'=>$seo->image,
            'page'=>'post-list',
            'data_search'=>$data_search,
             'pagination'=>$this->phan_trang($link,$total_page,$page),
            'list'=>$list
        );
        $this->load->view("site/master-page",$data);
    }
    public function chu_de($slug="",$page=1){
         $data_search=array(
            'groups_type'=>1,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
    	$categories=$this->M_categories->get_item_slug($slug);
    	$str="select posts.id as id,posts.title as title, posts.slug as slug,posts.thumbnail as thumbnail, categories.slug as categories_slug,posts.description as description, posts.create_time as create_time from posts, categories where posts.status=1 and categories.slug='{$slug}' and categories.id = posts.categories_id ";
    	$total=$this->M_posts->get_total_query($str);
        $limit=$this->limit;
        $total_page=ceil($total/$limit);
        $start=($page-1)*$limit;
        $link=base_url().$slug;
        $str.=" order by posts.create_time desc limit ".$start.",".$limit;
        $list=$this->M_posts->select_query($str);
        $data=array(
            'title'=>$categories->title,
            'description'=>$categories->description,
            'keywords'=>$categories->keywords,
            'image'=>$categories->thumbnail,
            'page'=>'post-list',
            'data_search'=>$data_search,
            'pagination'=>$this->phan_trang($link,$total_page,$page),
            'list'=>$list

        );
        $this->load->view("site/master-page",$data);
    }
    public function huong_dan(){
         $data_search=array(
            'groups_type'=>1,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,

            'address'=>""
        );
     $categories=$this->M_categories->get_item_slug('huong-dan');
        $str="select posts.id as id,posts.title as title, posts.slug as slug,posts.thumbnail as thumbnail, categories.slug as categories_slug,posts.description as description, posts.create_time as create_time, posts.content as content from posts, categories where categories.slug='huong-dan' and categories.id = posts.categories_id order by posts.create_time desc";

        $list=$this->M_posts->select_query($str);
        $data=array(
            'title'=>$categories->title,
            'description'=>$categories->description,
            'keywords'=>$categories->keywords,
            'image'=>$categories->thumbnail,

            'page'=>'post-huong-dan',
            'data_search'=>$data_search,
            'list'=>$list
        );
        $this->load->view("site/master-page",$data);
        
    }
    public function view($slug_categories="",$slug="",$id=0){
         $data_search=array(
            'groups_type'=>0,
            'groups_slug'=>"",
            'groups_id'=>0,
            'group_title'=>'',
            'cities_code'=>0,
            'districts_code'=>0,
            'wards_code'=>0,
            'streets_code'=>0,
            'projects_code'=>0,
            'so_phong'=>-1,
            'muc_gia'=>-1,
            'dien_tich'=>-1,
            'huong'=>-1,
            'address'=>""
        );
    	$categories=$this->M_categories->get_item_slug($slug_categories);
    	$item=$this->M_posts->get_item($id);
        $data=array(
            'title'=>$item->title,
            'description'=>$item->description,
            'keywords'=>$item->keywords,
            'image'=>$item->thumbnail,
            'page'=>'post-item',
            'item'=>$item,
            'data_search'=>$data_search,
            'categories'=>$categories
        );
        $this->load->view("site/master-page",$data);
    }
}