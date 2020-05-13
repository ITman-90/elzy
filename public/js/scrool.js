$(document).ready(function(){
$(function(){
  if ($("#breadcrumbs").offset()){
    $('html, body').animate({
      scrollTop: $('#breadcrumbs').offset().top
    }, 1000);
  }
});
});