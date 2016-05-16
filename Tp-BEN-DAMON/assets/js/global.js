// Developped By Benjamin Gagné
// 2016/05/06
$(function(){
    console.log("jQuery branché et DOM chargé !");

    $('.aside_menu a').click(function(){
    //   $('.aside_menu a').each(function(){
    //     $(this).removeClass("active");
    //   });
    //   $(this).addClass("active");

      var target = "#";
      target += $(this).attr('data-smoothscroll');
      target = $(target);

      $("html, body").animate({
            scrollTop: target.offset().top
        }, 600);

    });

    var delay = false;

  $(document).on('mousewheel DOMMouseScroll', function(event) {
    event.preventDefault();
    if(delay) return;

    delay = true;
    setTimeout(function(){delay = false},150)

    var wd = event.originalEvent.wheelDelta || -event.originalEvent.detail;
    



    var sec= document.getElementsByTagName('section');
    if(wd < 0) {
      for(var i = 0 ; i < sec.length ; i++) {
        var t = sec[i].getClientRects()[0].top;
        if(t >= 40) break;
      }
    }
    else {
      for(var i = sec.length-1 ; i >= 0 ; i--) {
        var t = sec[i].getClientRects()[0].top;
        if(t < -20) break;
      }
    }
    $('html,body').animate({
      scrollTop: sec[i].offsetTop
    });

  });
});
