/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
});
function toggle_menu(){
  $("#menu-main").stop().slideToggle("slow");
}
function confim_delete(url_action){
    $('#modal-remove #btn-action').attr("href",url_action);
    $("#modal-remove").modal();
}
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
function change_wards(){
    var address=$("#wards option:selected").text()+", "+$("#districts option:selected").text()+", "+$("#cities option:selected").text();
    $("#address").val(address);
}
function change_streets(){
    var address=$("#streets option:selected").text()+", "+$("#districts option:selected").text()+", "+$("#cities option:selected").text();
    $("#address").val(address);
}
function change_projects(){
    var address=$("#projects option:selected").text()+", "+$("#districts option:selected").text()+", "+$("#cities option:selected").text();
    $("#address").val(address);
}
function change_districts(){
    var districts_code=$("#districts option:selected").val();
    $.ajax({
       url: base_url+'ajax/change_districts_wards/'+districts_code,
       type:  "POST",
       success: function(data_result){
           $("#wards").html(data_result);
           
           var address=$("#districts option:selected").text()+", "+$("#cities option:selected").text();
           $("#address").val(address);
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

function change_groups(groups_type){
  $("#header-form-search a").removeClass('active');
  $("#groups_"+groups_type).addClass('active');

  $("#search-box h2").removeClass('active');
  $("#h2-"+groups_type).addClass('active');
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
       url: base_url+'ajax/change_groups_prices/'+groups_type,
       type:  "POST",
       success: function(data_result){
           $("#prices").html(data_result);
       },
       error: function(){
           alert("lỗi");
       }
    });
  if(groups_type==1){
    $("#form-search").attr('data-slug','nha-dat-ban');
  }else{
    $("#form-search").attr('data-slug','nha-dat-cho-thue');
  }
}

function submit_search(){
  //$("#form-search").attr('action',base_url+'search');
  
  var search_url=$("#form-search").attr('data-slug');
  var groups_slug=$("#groups_code option:selected").attr('data-slug');
  var cities_slug=$("#cities option:selected").attr('data-slug');
  var districts_slug=$("#districts option:selected").attr('data-slug');
  var streets_slug=$("#streets option:selected").attr('data-slug');
  var wards_slug=$("#wards option:selected").attr('data-slug');
  var projects_slug=$("#projects option:selected").attr('data-slug');

  var price=$("#prices option:selected").val();
  var acreages=$("#acreages option:selected").val();
  var room=$("#room option:selected").val();
  var directions=$("#directions option:selected").val();

  var address="";
  if(groups_slug!=""){
    search_url=groups_slug;
  }
  if(projects_slug!=""){
    address=projects_slug;
  }else{
      if(wards_slug!=""){
        address=wards_slug;
      }else{
        if(districts_slug!=""){
          address=districts_slug;
        }else{
          if(cities_slug!=""){
            address=cities_slug;
          }
        }
      }
  }
  if(address!=""){
    search_url=base_url+search_url+"-"+address;
  }else{
    search_url=base_url+search_url;
  }

  if(price!=-1 || acreages!=-1 || room!=-1 || directions!=-1){
    search_url=search_url+"/"+price+"/"+room+"/"+acreages+"/"+directions;
  }
  search_url+=".html";
  $("#form-search").attr('action',search_url);
}

function tim_kiem(){
  //$("#form-search").attr('action',base_url+'search');
  
  var keyword=$("#keyword").val();
  var the_loai=$("#the-loai option:selected").val();

  search_url=base_url+the_loai+".html?keyword="+keyword;
  $("#tim-nhanh").attr('action',search_url);
}

function site_map(groups_type){
  $("#header-1 a").removeClass('active');
  $("#header-1 #btn-"+groups_type).addClass('active');
  if(groups_type==1){
    $("#page-2").stop().hide('slow');
    $("#page-1").stop().show('slow');
  }else{
    $("#page-1").stop().hide('slow');
    $("#page-2").stop().show('slow');
  }
}