$(document).ready(function(){
    function stopAnimation()
{
    $('.home-img').css("-webkit-animation", "none");
    $('.home-img').css("-moz-animation", "none");
    $('.home-img').css("-ms-animation", "none");
    $('.home-img').css("animation", "none");
}
    
    $('.login').hide();
    
    $(".content_customer").hide();
    $(".content_customer1").hide();
    $(".content_customer2").hide();
    $(document).on('click','.logintab',function(){
        $(".logintab").addClass("btn-green");
        $(".hometab").removeClass("btn-green");
       
        $(".contact").removeClass("btn-green");
        
        $(".content_customer").hide();
        $(".content_customer1").hide();
        $(".content_customer2").hide();
        $("#a").show();
        $(".home-img").show();
        $(".left_panel").slideUp(200);
        $(".right_panel").slideUp(200);
        $(".home-img").removeClass("move-right");
        $(".home-img").addClass("move-left");
        stopAnimation();
        setTimeout(
          function() 
          {
            $('.login').slideDown(200);
          }, 500);
    });  
    $(document).on('click','.contact',function(){
        $(".logintab").removeClass("btn-green");
        $(".hometab").removeClass("btn-green");
        
        $(".contact").addClass("btn-green");
        
        $(".login").hide();
        $(".content_customer1").hide();
        $(".content_customer2").hide();
        $("#a").show();
        $(".left_panel").slideUp(200);
        $(".right_panel").slideUp(200);
         $(".home-img").slideUp(200);
        $(".content_customer").show();
        
    });
       $(document).on('click','.fcontact',function(){
           $(".logintab").removeClass("btn-green");
        $(".hometab").removeClass("btn-green");
        
        $(".contact").addClass("btn-green");
       
        $(".login").hide();
        $(".content_customer1").hide();
           $(".content_customer2").hide();
        $("#a").show();
        $(".left_panel").slideUp(200);
        $(".right_panel").slideUp(200);
         $(".home-img").slideUp(200);
        $(".content_customer").show();
        
    });
    $(document).on('click','.sob',function(){
       
        $(".login").hide();
        $(".content_customer").hide();
        $(".content_customer2").hide();
        $("#a").show();
        $(".left_panel").slideUp(200);
        $(".right_panel").slideUp(200);
         $(".home-img").slideUp(200);
        $(".content_customer1").show();
        
    });
    $(document).on('click','.fsob',function(){
        
       
        $(".login").hide();
        $(".content_customer").hide();
        $(".content_customer2").hide();
        $("#a").show();
        $(".left_panel").slideUp(200);
        $(".right_panel").slideUp(200);
         $(".home-img").slideUp(200);
        $(".content_customer1").show();
        
    });
    
    $(document).on('click','.faq',function(){
        
        
        $(".login").hide();
        $(".content_customer").hide();
        $(".content_customer1").hide();
        $("#a").show();
        $(".left_panel").slideUp(200);
        $(".right_panel").slideUp(200);
         $(".home-img").slideUp(200);
        $(".content_customer2").show();
    });
});