jQuery(document).ready(function ($) {
  // Make the menu responsive for the mobile view
  $('#menu-main-navigation').slicknav({
    appendTo: '.slicknav-wrapper',
    label: '',
    closedSymbol: '&#9658;',
    openedSymbol: '&#9660;',
  });

  // Run the bxSlider library on testimonial section
  $('.testimonials-list').bxSlider({
    controls: false,
    mode: 'fade',
  });
});
