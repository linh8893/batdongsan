<style type="text/css" >
    .post-header h1{
        font-size: 16px;
        font-weight: bold;
    }
</style>            
            <section id="page">
    <div class="container">
        <div class="row">
            
            <div class="col-md-8" id="page-right">
                 <div class="page-header">
                    <h2><?=$categories->title;?></h2>
                </div>
                <!--End .page-header-->
                <div class="page-content">
                    <div class="post-header post-extend-link">
                        <h1><?=$item->title;?></h1>
                        <p>
                        <i class="fa fa-clock-o"></i> <?=date('d-m-Y',$item->create_time);?>

                         <a class="facebook" style="background-color: #3b5998;" href="https://www.facebook.com/sharer/sharer.php?u=<?=current_url();;?>" target="_blank" title="Chia sẻ Facebook"><i class="fa fa-facebook"></i></a>
                            <a class="google" style="background-color: #D5452E;" href="https://plus.google.com/share?url=<?=current_url();;?>" target="_blank" title="Chia sẻ Google"><i class="fa fa-google-plus"></i></a>
                        </p>
                        <p><strong><?=$item->description;?></strong></p>
                    </div>
                    <div class="post-content">
                        <?=$item->content;?>
                    </div>
                </div>
                <!--End .page-content-->
            </div>
            <!--End .col-md-9-->
            <div class="col-md-4 hidden-sm hidden-xs" id="siderbar">
               <?php include_once 'inc/sidebar-search.php';?>
               
               <?php include_once 'inc/sidebar-chu-de.php';?>
            </div>
            <!--End col-md-4-->
        </div>
        <!--End .row-->
    </div>
    <!--End .container-->
</section>
<!--End #page-list-->