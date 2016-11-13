 <?php $account=$this->session->userdata('account');?>
<?php include_once 'inc/header.php';?>

        <div id="main">
            <?php include_once $page.".php";?>
        </div>
        <!-- Modal -->
    <div id="modal-remove" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Xác nhận thao tác</h4>
          </div>
          <div class="modal-body">
            <p>Bạn có đồng ý thực hiện thao tác này</p>
          </div>
          <div class="modal-footer">
                <a id="btn-action" href="#" class="btn btn-primary no-radius" ><i class="fa fa-save"></i> Thực hiện</a>
                <button type="button" class="btn btn-danger no-radius" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
          </div>
        </div>

      </div>
    </div>
<?php include_once 'inc/footer.php';?>