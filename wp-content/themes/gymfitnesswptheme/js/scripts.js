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

  // When the page is ready and the fixed menu position is > 300px
  const headerScroll = document.querySelector('.navigation-bar');
  const rect = headerScroll.getBoundingClientRect();
  const topDistance = Math.abs(rect.top);

  fixedMenu(topDistance);
});

// Add animation to main nav when scrolling page
window.onscroll = () => {
  const scroll = window.scrollY;
  fixedMenu(scroll);
};

// Add a fixed menu on Top
function fixedMenu(scroll) {
  const headerScroll = document.querySelector('.navigation-bar');

  // in the case that the scroll is greater than 300, add some classes
  if (scroll > 300) {
    headerScroll.classList.add('fixed-top');
  } else {
    headerScroll.classList.remove('fixed-top');
  }
}
