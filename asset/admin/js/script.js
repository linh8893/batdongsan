function toggle_sidebar(){
    $(".sidebar, #page-wrapper").toggleClass("active");
}
function confim_delete(url_action){
    $('#modal-remove #btn-action').attr("href",url_action);
    $("#modal-remove").modal();
}
function create_slug(input_id,output_id) {
    var title, slug;
    //Lấy text từ thẻ input title 
    title = document.getElementById(input_id).value;
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    //$(output_id).val(slug);
    $("#"+output_id).val(slug);
 };
 
function change_groups_type(){
    var groups_type=$("input[name='groups_type']:checked").val();
    $.ajax({
       url: base_url+'ajax/change_groups_type/'+groups_type,
       type:  "POST",
       success: function(data_result){
           $("#groups_code").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
    $.ajax({
       url: base_url+'ajax/change_groups_units/'+groups_type,
       type:  "POST",
       success: function(data_result){
           $("#units").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
}
function change_groups_type_2(){
    var groups_type=$("#groups_type option:selected").val();
    $.ajax({
       url: base_url+'ajax/change_groups_units/'+groups_type,
       type:  "POST",
       success: function(data_result){
           $("#units").html(data_result);
           $("#units_2").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
}
function change_cities(){
    var cities_code=$("#cities option:selected").val();
    $.ajax({
       url: base_url+'ajax/change_cities/'+cities_code,
       type:  "POST",
       success: function(data_result){
           $("#districts").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
}
function change_districts(){
    var districts_code=$("#districts option:selected").val();
    $.ajax({
       url: base_url+'ajax/change_districts_wards/'+districts_code,
       type:  "POST",
       success: function(data_result){
           $("#wards").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
    $.ajax({
       url: base_url+'ajax/change_districts_streets/'+districts_code,
       type:  "POST",
       success: function(data_result){
           $("#streets").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
    $.ajax({
       url: base_url+'ajax/change_districts_projects/'+districts_code,
       type:  "POST",
       success: function(data_result){
           $("#projects").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
}
$(document).ready(function(){
   $('input[type="checkbox"]').click(function(){
       if($(this).is(":checked")){
           if($(this).val()==="all"){
               var checkboxes = $(this).closest('table').find(':checkbox');
               checkboxes.prop('checked', true);
           }else{
               $('input[value="all"]').prop('checked', false);
           }
       }else{
           if($(this).val()!=="all"){
               $('input[value="all"]').prop('checked', false);
           }
       }
   });
});

