<style type="text/css" >
    .post-header h1{
        font-size: 16px;
        font-weight: bold;
    }
    .post-content img{
        max-width: 100%;
    }
    .post-header {
        text-align: center;
    }
    .post-header img{
        margin: 10px auto;       
        max-height: 100px;
        vertical-align: middle;
        margin-bottom: 10px;
    }
    .post-content{
        line-height: 1.5em;
    }
</style>            
            <section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="page-right">
                <ul class="nav nav-tabs">
                 <?php 
                    $i=0; foreach ($list as $row) { $i++; 

                        if($i==1){?>
                    <li class="active"><a data-toggle="tab" href="#item-<?=$i;?>"><i class="fa fa-book"></i> <?=$row->title;?></a></li>
                    <?php }else{ ?>
                    <li><a data-toggle="tab" href="#item-<?=$i;?>"><i class="fa fa-book"></i> <?=$row->title;?></a></li>
                    <?php
                        }
                     }?>
                </ul>
                <div class="tab-content">
                <?php 
                $i=0; foreach ($list as $row) { $i++; 
                    if($i==1){
                    ?>
                    <div id="item-<?=$i;?>" class="tab-pane fade in active">
                        <!--End .page-header-->
                        <div class="page-content">
                            <div class="post-header ">
                                <img src="<?=$row->thumbnail;?>" class="img-responsive" >
                            </div>
                            <div class="post-content">
                                <?=$row->content;?>
                            </div>
                        </div>
                        <!--End .page-content-->
                    </div>
                    <!--End item-->

                    <?php
                }else{?>
                <div id="item-<?=$i;?>" class="tab-pane fade">
                        <!--End .page-header-->
                        <div class="page-content">
                            <div class="post-header ">
                                <img src="<?=$row->thumbnail;?>" class="img-responsive" >
                            </div>
                            <div class="post-content">
                                <?=$row->content;?>
                            </div>
                        </div>
                        <!--End .page-content-->
                    </div>
                    <!--End item-->
                    <?php

}
                }
                ?>
                </div>
            </div>
            <!--End .col-md-9-->
           
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->