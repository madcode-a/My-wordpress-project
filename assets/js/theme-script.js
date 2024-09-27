function roofing_flooring_openNav() {
  jQuery(".sidenav").addClass('show');
}
function roofing_flooring_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function roofing_flooring_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const roofing_flooring_nav = document.querySelector( '.sidenav' );

      if ( ! roofing_flooring_nav || ! roofing_flooring_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...roofing_flooring_nav.querySelectorAll( 'input, a, button' )],
        roofing_flooring_lastEl = elements[ elements.length - 1 ],
        roofing_flooring_firstEl = elements[0],
        roofing_flooring_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && roofing_flooring_lastEl === roofing_flooring_activeEl ) {
        e.preventDefault();
        roofing_flooring_firstEl.focus();
      }

      if ( shiftKey && tabKey && roofing_flooring_firstEl === roofing_flooring_activeEl ) {
        e.preventDefault();
        roofing_flooring_lastEl.focus();
      }
    } );
  }
  roofing_flooring_keepFocusInMenu();
} )( window, document );

var roofing_flooring_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    roofing_flooring_btn.addClass('show');
  } else {
    roofing_flooring_btn.removeClass('show');
  }
});

roofing_flooring_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('.featured .owl-carousel');
    owl.owlCarousel({
    margin: 40,
    nav:false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots: false,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 2
      },
      1000: {
        items: 3
      },
      1200: {
        items: 4
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery(document).ready(function($) {
  $("p.site-title a,h1.site-title a").html(function() {
      var text2 = $(this).text().trim().split(" ");
      var lastWord = text2.pop(); // Remove and store the last word

      if (text2.length > 0) {
          var remainingText = text2.join(" ");
          return `${remainingText} <span class='last_slide_head'>${lastWord}</span>`;
      } else {
          return `<span class='last_slide_head'>${lastWord}</span>`;
      }
  });
});

