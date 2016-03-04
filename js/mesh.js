jQuery(document).ready(function($){

  $(document).ready(function(){
    $('.slider').slick({
      autoplay: true,
      arrows: false,
      dots: true
    });
  });

  //Let's do something awesome!

  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

  // $('.pub-title').click(function(){
  //   $(this).addClass('active');
  //   $(this).not($(this)).removeClass('active');
  // });

  var bh = $('body.post-type-archive-press').height();


  function fix_body_height(){
    $('.post-type-archive-press').css({'height': bh-100});
  }
  
  $(window).load(fix_body_height);
  $(window).resize(fix_body_height);

  $('.parallax').parallax();

  var ww = $(window).width();

  if (ww <= 768){

    //Mobile layout for press items
    $('.filter').click(function(){
      $(this).toggleClass('active');
      $(this).next().slideToggle('slow');
      $('.filter').not($(this)).removeClass('active').next().slideUp('slow');
    });

    //$('.results.hide').remove();
  }

  $('.main-navigation ul li').hover(function(){

    var _this = $(this);

    $(this).find('a').next().slideDown('200');
    //$('.main-navigation ul li').not($(this)).find('ul.sub-menu').slideUp('200');
  },function(){
    $(this).find('a').next().slideUp('200');
  })

 
  // var s = skrollr.init();
  // var s = skrollr.init({
  //   edgeStrategy: 'set',
  //   easing: {
  //     WTF: Math.random,
  //     inverted: function(p) {
  //       return 1-p;
  //     }
  //   }
  // });
  
 // var dh = $(document).height();
 //  var blh = $('.blue-rectangle').height();

 //  $('body').css({'height':dh-blh});

 // sidr - mobile show/hide nav

  $('.nav_trigger').sidr({
      name: 'sidr-main',
      source: '.main-navigation',
      renaming: false,
    });

   $('.close').click(
    function(){
      $.sidr('close', 'sidr-main');
       //console.log("Sidr should be closed");
    });


  // Filtering and sorting
if (ww > 768){
  $(function(){
    $('#container').mixItUp();
});
}
});
