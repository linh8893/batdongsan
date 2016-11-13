<style type="text/css">
	.post-content ul{
		padding: 0;
		margin: 0;
		margin-left: 15px;
	}
	.post-content ul li{
		margin: 6px 0;
	}
	#page .page-header#header-1 {
		border-bottom: 0;
	}
	#page .page-header h1{
		background-color: white;
	    color: white;
	    padding-left: 0px;
	    padding-right: 0px;
	    padding-top: 0px; 
	    padding-bottom: 0px; 
	}
	.page-header h1 a{
		display: inline-block;
		padding: 10px 15px;
		background-color: #ccc;
		color: #333333;
		text-decoration: none;
	}
	.page-header h1 a.active,.page-header h1 a:hover{
		background-color: #0286D0;
		color: white;
	}
	#page-2{
		display: none;
	}
</style>
<section id="page">
    <div class="container">
        <div class="row">
	        <div class="col-md-12">
	         	<div class="page-header" id="header-1">
                    <h1>
                    <a id="btn-1" class="active" href="javascript:site_map(1);">Nhà đất bán</a>
                    <a  id="btn-2" href="javascript:site_map(2);">Nhà đất cho thuê</a>
                    </h1>

                </div>
                <!--End hheader-->
                <!--End hheader-->
                <div class="page-content" id="page-1">
                	<div class="row">
	        			<div class="col-md-3 box" >
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất bán theo khu vực</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<?php $list=$this->M_productions->get_list_cities();
									$n=count($list);
									$n_2=ceil($n/2);
									if($n==0){
										echo '<div class="col-md-12"></br><p>Đang cập nhật dữ liệu</p></div>';
									}
									?>
									<div class="col-md-6">
										<ul>
											<?php 
											for($i=0;$i<$n_2;$i++){ 
												if(isset($list[$i])){
												?>
												<li><a href="<?=base_url();?>nha-dat-ban-<?=$list[$i]->slug;?>.html"> <?=$list[$i]->name;?> <span class="text-red">(<?=$list[$i]->count_bds;?>)</span></a></li>
												<?php
											}
											}
											?>
										</ul>
									</div>
									<div class="col-md-6">
										<ul>
											<?php 
											for($i=$n_2;$i<$n;$i++){ 
												if(isset($list[$i])){
												?>
												<li><a href="<?=base_url();?>nha-dat-ban-<?=$list[$i]->slug;?>.html"> <?=$list[$i]->name;?> <span class="text-red">(<?=$list[$i]->count_bds;?>)</span></a></li>
												<?php
											}
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
						<div class="col-md-3">
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất bán theo diện tích</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<div class="col-md-12">
										<ul>
											<?php 
											$list=$this->M_acreages->get_list();
											foreach ($list as $row) { ?>
												<li><a href="<?=base_url();?>nha-dat-ban/-1/-1/<?=$row->code;?>/-1.html"> <?=$row->name;?></a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
						<div class="col-md-3">
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất bán theo phân loại</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<div class="col-md-12">
										<ul>
											<?php 
											$input=array();
											$input['where']=array('type'=>1);
											$list=$this->M_groups->get_list($input);
											foreach ($list as $row) { ?>
												<li><a href="<?=base_url();?><?=$row->slug;?>.html"> <?=$row->title;?> </a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
						<div class="col-md-3">
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất bán theo mức giá</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<div class="col-md-12">
										<ul>
											<?php 
											$input=array();
											$input['where']=array('groups_type'=>1);
											$list=$this->M_prices->get_list();
											foreach ($list as $row) { ?>
												<li><a href="<?=base_url();?>nha-dat-ban/<?=$row->code;?>/-1/-1/-1.html"> <?=$row->name;?></a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
	                </div>
                </div>
                <!--End content-->
                <div class="page-content" id="page-2">
                	<div class="row">
	        			<div class="col-md-3 box" >
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất thuê theo khu vực </h2>
							</div>
							<div class="post-content">
								<div class="row">
									<?php $list=$this->M_productions->get_list_cities(2);
									$n=count($list);
									$n_2=ceil($n/2);
									if($n==0){
										echo '<div class="col-md-12"></br><p>Đang cập nhật dữ liệu</p></div>';
									}
									?>
									<div class="col-md-6">
										<ul>
											<?php 
											for($i=0;$i<$n_2;$i++){ 
												if(isset($list[$i])){
												?>
												<li><a href="<?=base_url();?>nha-dat-cho-thue-<?=$list[$i]->slug;?>.html"> <?=$list[$i]->name;?> <span class="text-red">(<?=$list[$i]->count_bds;?>)</span></a></li>
												<?php
											}
											}
											?>
										</ul>
									</div>
									<div class="col-md-6">
										<ul>
											<?php 
											for($i=$n_2;$i<$n;$i++){ 
												if(isset($list[$i])){
												?>
												<li><a href="<?=base_url();?>nha-dat-cho-thue-<?=$list[$i]->slug;?>.html"> <?=$list[$i]->name;?> <span class="text-red">(<?=$list[$i]->count_bds;?>)</span></a></li>
												<?php
											}
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
						<div class="col-md-3">
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất thuê theo diện tích</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<div class="col-md-12">
										<ul>
											<?php 
											$list=$this->M_acreages->get_list();
											foreach ($list as $row) { ?>
												<li><a href="<?=base_url();?>nha-dat-cho-thue/-1/-1/<?=$row->code;?>/-1.html"> <?=$row->name;?></a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
						<div class="col-md-3">
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất thuê theo phân loại</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<div class="col-md-12">
										<ul>
											<?php 
											$input=array();
											$input['where']=array('type'=>2);
											$list=$this->M_groups->get_list($input);
											foreach ($list as $row) { ?>
												<li><a href="<?=base_url();?><?=$row->slug;?>.html"> <?=$row->title;?> </a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
						<div class="col-md-3">
		                	<div class="page-header">
		                   		<h2><i class= "fa fa-home"></i> Nhà đất thuê theo mức giá</h2>
							</div>
							<div class="post-content">
								<div class="row">
									<div class="col-md-12">
										<ul>
											<?php 
											$input=array();
											$input['where']=array('groups_type'=>1);
											$list=$this->M_prices->get_list();
											foreach ($list as $row) { ?>
												<li><a href="<?=base_url();?>nha-dat-cho-thue/<?=$row->code;?>/-1/-1/-1.html"> <?=$row->name;?></a></li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--End col-->
	                </div>
                </div>
                <!--End content-->
	        </div>
        </div>
     </div>
 </section>