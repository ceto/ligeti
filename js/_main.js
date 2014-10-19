

jQuery(document).ready(function(){
  $('.ib').popover();
  function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
  }

  $(".ugrogomb").click(function() {
    event.preventDefault();
    scrollToAnchor( $(this).attr('href').replace('#','') ) ;
  });


  // var $container = $('.product-listing');
  // $container.isotope({
  //   itemSelector: '.obj',
  //   layoutMode: 'cellsByRow',
  //   animationOptions: {
  //     duration: 750,
  //     easing: 'linear',
  //     queue: false
  //   }
  // });


  $('.prodcat-menu a').click(function(){
    var selector = $(this).attr('data-filter');
    //$container.isotope({ filter: selector });
    return false;
  });


});



var navigation = responsiveNav("#nav", { // Selector: The ID of the wrapper
  animate: true, // Boolean: Use CSS3 transitions, true or false
  transition: 400, // Integer: Speed of the transition, in milliseconds
  label: "Menü", // String: Label for the navigation toggle
  insert: "after", // String: Insert the toggle before or after the navigation
  customToggle: "nav-toggle", // Selector: Specify the ID of a custom toggle
  openPos: "relative", // String: Position of the opened nav, relative or static
  jsClass: "js", // String: 'JS enabled' class which is added to <html> el
  init: function(){}, // Function: Init callback
  open: function(){}, // Function: Open callback
  close: function(){} // Function: Close callback
});





