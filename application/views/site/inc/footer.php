        <!--End #main-->
        <footer>
            <div id="company-info">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs hidden-sm col-md-3">
                            <div class="logo-footer">
                                <img src="<?=base_url();?>asset/images/logo-footer-batdongsanflan.png" alt="logo-footer-batdongsanflan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                           <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                           <g:plusone></g:plusone>
                           <p>Email: <?=$setting->email;?></p>
                           <p>Điện thoại: <?=$setting->phone;?> | Skype: <?=$setting->skype;?> | Zalo: <?=$setting->zalo;?></p>
                           <p><?=$setting->address;?></p>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div id="footer-extend">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fa fa-copyright"></i> 2016 <span class="hidden-sm hidden-xs">Copyright by  batdongsanflan.com.vn </span>. Design by <a href="http://minhthanhsoft.com">MT-SOFT</a> </p>
                        </div>
                        <!--
                        <div class="col-md-6 hidden-sm hidden-xs hidden-md">
                            <ul>
                                <li><a href="#">Liên kết website</a></li>
                                <li><a href="#">Liên kết website</a></li>
                                <li><a href="#">Liên kết website</a></li>
                                <li><a href="#">Liên kết website</a></li>
                            </ul>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </footer>
        <!--End footer-->
        
        <!--Jquery-->
        <script src="<?=base_url();?>asset/js/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <script>
        jQuery(function ($)
            {
              $.datepicker.regional["vi-VN"] =
                    {
                            closeText: "Đóng",
                            prevText: "Trước",
                            nextText: "Sau",
                            currentText: "Hôm nay",
                            monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
                            monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
                            dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
                            dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
                            dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                            weekHeader: "Tuần",
                            dateFormat: "dd-mm-yy",
                            firstDay: 1,
                            isRTL: false,
                            showMonthAfterYear: false,
                            yearSuffix: ""
                    };
                    $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
            });
            $( function() {
              $( "#datepicker,#datepicker-1,#datepicker-2" ).datepicker();
            } );
        </script>
     
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

        <script type="text/javascript" src="<?=base_url();?>asset/js/script.js"></script>
    </body>
</html>
