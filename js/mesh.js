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

  // Filtering and sorting

  $(function(){
    $('#container').mixItUp();
});

});
