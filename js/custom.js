// init Skollr
	skrollr.init({
		forceHeight: false
  });

// Scroll to top button
  jQuery('.btp').on('click', function(e) {
    e.preventDefault();
    jQuery('html, body').animate({scrollTop:0}, '300');
  });

// Hamburger menu
jQuery( "body" ).on('click', '.hamburger', function() {
    jQuery('.mobile-nav').animate({'height': 'toggle'}, 200);
    jQuery('main').toggleClass('blurred');
    jQuery('.mt-btns').toggleClass('displayed');
    jQuery('.hamburger div:nth-child(1)').toggleClass('first');
    jQuery('.hamburger div:nth-child(2)').toggleClass('middle');
    jQuery('.hamburger div:nth-child(3)').toggleClass('last');
  });

// Counter
  var a = 0;
jQuery(window).scroll(function() {

  var oTop = jQuery('#counter').offset().top - window.innerHeight;
  if (a == 0 && jQuery(window).scrollTop() > oTop) {
    jQuery('.counter-value').each(function() {
      var $this = jQuery(this),
        countTo = $this.attr('data-count');
        jQuery({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});