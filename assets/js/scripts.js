
/*
These functions make sure WordPress
and Materialize play nice together.
*/

$(document).ready(function(){

     // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

// Remove empty P tags created by WP inside of Accordion and Orbit


  //  jQuery('.accordion p:empty, .orbit p:empty').remove();


  //$('select').material_select();

  $('.button-collapse').sideNav({
  menuWidth: 300, // Default is 300
  edge: 'left', // Choose the horizontal origin
  closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
  draggable: true // Choose whether you can drag to open on touch screens
}
);


  $('.modal').modal();




});

var options = [
    {selector: '#About', offset: 0, callback: 'Materialize.fadeInImage("#About")' },
    {selector: '#section-1', offset: 0, callback: 'Materialize.fadeInImage("#section-1")' },
    {selector: '#section-2', offset: 0, callback: 'Materialize.fadeInImage("#section-2")' },
    {selector: '#section-3', offset: 0, callback: 'Materialize.fadeInImage("#section-3")' }
];
Materialize.scrollFire(options);

// $(function() {
//   $( "#button" ).click(function() {
//     if($("body").attr("id") === "accessible"){
//       localStorage.setItem('bodyIdName', 'normal');
//        $("body").attr("id", "normal");
//        $("article").css("transition", "350ms");
//        $('#button').html('<i class="mdi mdi-eye" aria-hidden="true"></i>');
//        var storedIdName = localStorage.getItem('bodyIdName');
//
//    } else{
//   localStorage.setItem('bodyIdName', 'accessible');
//    $("body").attr("id", "accessible");
//    $("article").css("transition", "350ms");
//    $('#button').html('<i class="mdi mdi-eye-off" aria-hidden="true"></i>');
//    var storedIdName = localStorage.getItem('bodyIdName');
//  }
//   });
//
// });

// var headerHeight = $("#main-nav").height() + 10;
//
//
//     $('a[href^="#About"]').on('click',function (e) {
//         e.preventDefault();
//
//
//         var target = this.hash,
//         $target = $(target);
//
//         $('html, body').stop().animate({
//
//             'scrollTop': $target.offset().top - headerHeight
//
//         }, 1200, 'swing', function () {
//             window.location.hash = target ;
//
//         });
//     });

// altered from above to prevent jumping in Microsoft Edge

$('body').on('click','a[href^="#"]',function(event){
     event.preventDefault();
     var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
     //change this number to create the additional off set
     var customoffset = $("header").height();
     $('html, body').animate({scrollTop:target_offset - customoffset}, 900);
 });




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



   function addEvent(obj, type, fn) {
      if (obj.attachEvent) {
        obj['e' + type + fn] = fn;
        obj[type + fn] = function() {
          obj['e' + type + fn](window.event);
        }
        obj.attachEvent('on' + type, obj[type + fn]);
      } else obj.addEventListener(type, fn, false);
    }

    function switchStyles() {
      var selectedOption = document.querySelector('input[name="style"]:checked').value; //this.options[this.selectedIndex],


      document.body.className = selectedOption;
      localStorage.setItem("bodyClassName", selectedOption);
    }

    var styleSwitcher = document.getElementById("styleSwitcher");
    if (styleSwitcher) {
      addEvent(styleSwitcher, "change", switchStyles);
    }


    var storedClassName = localStorage.getItem("bodyClassName");
    if (storedClassName) {
      var bodyClassRadio = document.getElementById("r"+storedClassName);
      if (bodyClassRadio) {
        bodyClassRadio.checked = true;
      }
      document.getElementsByTagName("body")[0].classList.add(storedClassName);//setAttribute("class", storedClassName);
    }

    function switchText() {
      var selectedOption = document.querySelector('input[name="text"]:checked').value; //this.options[this.selectedIndex],
        if (selectedOption) {

      document.getElementsByTagName("body")[0].setAttribute("id", "body-"+selectedOption);

      localStorage.setItem("bodyIdName", selectedOption);
    }
    }

    var textSwitcher = document.getElementById("textSwitcher");
      if (textSwitcher) {
    addEvent(textSwitcher, "change", switchText);
}
    var storedIdName = localStorage.getItem("bodyIdName");
    if (storedIdName) {
      var bodyIdRadio = document.getElementById("r"+storedIdName);
      if (bodyIdRadio) {
        bodyIdRadio.checked = true;
      }
      document.getElementsByTagName("body")[0].setAttribute("id", "body-"+storedIdName);
    }
