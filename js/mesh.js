jQuery(document).ready(function($){

  $(document).ready(function(){
    $('.slider').slick({
      autoplay: true,
      arrows: false,
      dots: true
    });
  });

  //Let's do something awesome!

  $('.main-navigation ul li ul li a').click(function() {

    console.log($(this).parent().parent().hide());
  })

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

    $(this).find('a').next().stop( true, true ).slideDown('200');
    //$('.main-navigation ul li').not($(this)).find('ul.sub-menu').slideUp('200');
  },function(){
    $(this).find('a').next().stop( true, true ).slideUp('200');
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
      side: 'right',
      displace: false,
      source: '.main-navigation',
      renaming: false,
    });

   $('.close').click(
    function(){
      $.sidr('close', 'sidr-main');
       //console.log("Sidr should be closed");
    });

  $('.menu-item-39 ul.sub-menu li').each(function(){

    var type = window.location.hash.substr(1);
    var url = $(this).find('a').attr('href');
    var path = window.location.href;

    if (path.indexOf('#') >= 0) {
      if (url.indexOf(type) >= 0) {

      } else {
        $(this).removeClass('current-menu-item');
      }
    } else {
      $(this).removeClass('current-menu-item');
    }

  });

  $('.sidr #menu-item-39 a').click(function(e) {
    e.preventDefault();

    $(this).parent().find('.sub-menu').slideDown();
  });
  $('.sidr #menu-item-39 a .sidr #menu-item-67 a').click(function(e) {
    e.preventDefault();
    //do other stuff when a click happens
    $(this).find(".sub-menu").slideDown();
  });

  $('.sidr menu-item-39').click(function() {
    $(this).find(".sub-menu").slideDown();
  });

  // New tabs

  /* ==========
     Variables
   ========== */
   var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  /* ==========
      Utilities
    ========== */
   function beginsWith(needle, haystack){
     return (haystack.substr(0, needle.length) == needle);
   };


  /* ==========
     Anchors open in new tab/window
   ========== */
   $('a').each(function(){

     if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab
      if( test == false && $(this).attr('href').indexOf('#') == -1){
        $(this).attr('target','_blank');
      }
     }



  // Filtering and sorting
  if (ww > 768){
    $(function(){

      $('#container').mixItUp({
      	load: {
      		filter: '.category-1'
      	},
      	controls: {
      		toggleFilterButtons: false
      	},
        animation: {
          enable: false
        }
      });
  });

}
});
