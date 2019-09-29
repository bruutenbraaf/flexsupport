// init Skollr
	skrollr.init({
		forceHeight: false
  });

  jQuery(window).load(function($) {
    skrollr.init({
      forceHeight: false
    });
  });

jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 160) {
      jQuery(".main-nav ul li a").addClass("colr--changed");
      jQuery(".main-nav").addClass("colr--changed");
  } else {
    jQuery(".main-nav").removeClass("colr--changed");
      jQuery(".main-nav ul li a").removeClass("colr--changed");
  }
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


// Smooth scroll to anchor 

jQuery('a[href*=\\#]').on('click', function (event) {
  target = jQuery(this).attr('href');
  if (target === '#') {
      event.preventDefault();
      return;
  } else if (target.slice(0, 1) === '#') {
      event.preventDefault();
      jQuery('html,body').animate({ scrollTop: jQuery(this.hash).offset().top }, 1000);
  }
});


jQuery(".dwn").click(function() {
  var cls = jQuery(this).closest("section").next().offset().top + -100;
  jQuery("html, body").animate({scrollTop: cls}, "slow");
});