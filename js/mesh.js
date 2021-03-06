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
            scrollTop: target.offset().top - 65
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

    var f = "." + window.location.hash.substr(1) + "-slide";
    var b = "." + window.location.hash.substr(1) + "-button";
    $(f).slideToggle('slow');
    $(b).addClass('active');
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

  $('.menu-item-267 ul.sub-menu li').each(function(){

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

  $('.sidr #menu-item-267 > a').attr('disabled', 'disabled');
  $('.sidr #menu-item-268 > a').attr('disabled', 'disabled');
  $('.sidr #menu-item-283 > a').attr('disabled', 'disabled');


  $('.sidr #menu-item-267 > a').hover(function(e) {
    if($(".sidr #menu-item-267 a").attr("disabled") == "disabled") {
      e.preventDefault();
      $(this).parent().find('.sub-menu').slideDown();
      $('.sidr #menu-item-267 a').removeAttr('disabled');
    }
  });

  $('.sidr #menu-item-268 > a').hover(function(e) {
    if($(".sidr #menu-item-268 a").attr("disabled") == "disabled") {
      e.preventDefault();
      $(this).parent().find('.sub-menu').slideDown();
      $('.sidr #menu-item-268 a').removeAttr('disabled');
    }
  });

  $('.sidr #menu-item-283 > a').hover(function(e) {
    if($(".sidr #menu-item-283 a").attr("disabled") == "disabled") {
      e.preventDefault();
      $(this).parent().find('.sub-menu').slideDown();
    }
  });

  $('#menu-item-283 > a').click(function(e) {
    e.preventDefault();
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
   });

  // Filtering and sorting
  $(function(){


      var filter = "." + window.location.hash.substr(1);

      $(window).on('hashchange',function(){
        location.reload();
      });



    $('#container').mixItUp({
      load: {
        filter: filter
      },
      controls: {
        toggleFilterButtons: false
      },
      animation: {
        enable: false
      }
    });

  });

});
