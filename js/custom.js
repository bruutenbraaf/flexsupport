// init Skollr
skrollr.init({
  smoothScrolling: false
});

jQuery(window).scroll(function () {
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
jQuery('.btp').on('click', function (e) {
  e.preventDefault();
  jQuery('html, body').animate({ scrollTop: 0 }, '300');
});

// Hamburger menu
jQuery("body").on('click', '.hamburger', function () {
  jQuery('.mobile-nav-fs').toggleClass('is_visible');
  jQuery('nav').toggleClass('mobile_is_visible');
  jQuery('.hamburger').toggleClass('is__open');
  jQuery('.mobile-nav-fs ul li a').toggleClass('show__me');
});

jQuery("body").on('click', '.mobile-nav-fs .menu-item-has-children', function () {
  jQuery(this).find('.sub-menu').slideToggle();
});


// Counter
var a = 0;
jQuery(window).scroll(function () {

  var oTop = jQuery('#counter').offset().top - window.innerHeight;
  if (a == 0 && jQuery(window).scrollTop() > oTop) {
    jQuery('.counter-value').each(function () {
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
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
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


jQuery(".dwn").click(function () {
  var cls = jQuery(this).closest("section").next().offset().top + -100;
  jQuery("html, body").animate({ scrollTop: cls }, "slow");
});