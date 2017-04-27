$(function() {
  $(document).scroll(function(){
    if($(this).scrollTop() >= 150){
      $('.fish-top-btn').fadeIn();
    }else{
      $('.fish-top-btn').fadeOut();
    }
  });
  $(document).on('click','.fish-top-btn',function(){
    $('body').animate({'scrollTop':'0px'},500);
  });
  
})
