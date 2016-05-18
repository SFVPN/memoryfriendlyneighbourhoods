
/*
These functions make sure WordPress
and Materialize play nice together.
*/

// Remove empty P tags created by WP inside of Accordion and Orbit
jQuery(document).ready(function() {
  //  jQuery('.accordion p:empty, .orbit p:empty').remove();

  $('.button-collapse').sideNav({
      edge: 'right', // Choose the horizontal origin
      menuWidth: 300
    }
  );
  $('select').material_select();

 $('.modal-trigger').leanModal();
 $(".modal-trigger").click(function(){
      $('.header').css('z-index', '89');
 });
$(".dropdown-button").click(function(){
  $width = $("li.dropdown").width();
  $(".mdi-menu-down").toggleClass("rotate");
  $(".dropdown-content").toggleClass("block").css("min-width", $("li.dropdown").width());
});
$(".add-image").removeClass("button").addClass("btn");
//$(".label").removeClass("label").addClass("chip");
$(".field input[value='Report location']").addClass("btn");
});

var options = [
    {selector: '#about-pathways', offset: 50, callback: 'Materialize.fadeInImage("#about-pathways")' },
    {selector: '#gettingStarted', offset: 50, callback: 'Materialize.fadeInImage("#gettingStarted")' },
    {selector: '.fixed-action-btn', offset: 50, callback: 'Materialize.fadeInImage(".fixed-action-btn")' }
];
Materialize.scrollFire(options);

$(document).ready(function(){
    $('.parallax').parallax();
  });

window.cookieconsent_options = {
       learnMore: 'More info',
       theme: 'dark-bottom',
       link: document.location.origin + '/privacy'
   };


   var markers = document.querySelectorAll('input[type="radio"]'),
       l = markers.length,
       i, txt;
   for (i = l - 1; i >= 0; i--) {
       txt = markers[i].nextSibling;
       $(txt).prev().attr('id', 'r' + markers[i].value);
       $(txt).wrap('<label for="r' + markers[i].value + '"/>');
   };

   var markers = document.querySelectorAll('input[type="checkbox"]'),
       l = markers.length,
       i, txt;
   for (i = l - 1; i >= 0; i--) {
       txt = markers[i].nextSibling;
       $(txt).prev().attr('id', 'r' + markers[i].value);
       $(txt).wrap('<label for="r' + markers[i].value + '"/>');
   };

   $(document).ready(function(){
  $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash;
      var $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top
      }, 900, 'swing', function () {
          window.location.hash = target;
      });
  });
 });
