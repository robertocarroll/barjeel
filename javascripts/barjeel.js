
if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
  var viewportmeta = document.querySelector('meta[name="viewport"]');
  if (viewportmeta) {
    viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0';
    document.body.addEventListener('gesturestart', function() {
      viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
    }, false);
  }
}


/*! For finding the current browser width */

var current_width;
var isotope_columns = null;

jQuery(document).ready(function($){

  current_width = $(window).width();
      $('.attachment-homepage-thumb').width('100%');
      $('.attachment-homepage-thumb').height('auto');
      $('#input_1_7:contains(" : ")').html(function(index,oldhtml) {
    return oldhtml.replace(' : ','');
});

  });



jQuery(document).ready(function($){

var jPM = $.jPanelMenu({
    menu: '#menu-main',
    trigger: '.menu-trigger',
    direction: 'right',
    openPosition: '100%'
});

var closeBtn = false;
var paginationMove = false;
var searchBox = $('.widget_search').clone();


function addCloseBtn () {
  $(document).on("click", ".menu-trigger", function (e) {
    $("#jPanelMenu-menu").prepend( "<div class='menu-close' id='close-menu'></div>" );
    $("#jPanelMenu-menu").append(searchBox);
  });

  closeBtn = true;
}

addCloseBtn();

$(document).on("click", "#close-menu", function (e) {
        jPM.close();

        $( "#close-menu" ).remove();
        
        e.preventDefault();
    });

function movePagination () {

  var pagination = $(".pagination-wrapper"); 
  $(pagination).remove();
  $(pagination).insertAfter( "#content" );
  paginationMove = true;

}

function movePaginationBack () {

  var pagination = $(".pagination-wrapper"); 
  $(pagination).remove();
  $(pagination).insertAfter( ".browse-wrapper" );
  paginationMove = false;

}

var jRes = jRespond([
    {
        label: 'small',
        enter: 0,
        exit: 695

    },{
        label: 'large',
        enter: 695,
        exit: 10000
    }
]);

jRes.addFunc({
      breakpoint: 'small',
      enter: function() {
          jPM.on();
          $('.menu-trigger').click(function(){});

        if(!closeBtn){
          addCloseBtn();
        }

        if(!paginationMove){
          movePagination();
        }
      },
      exit: function() {
          jPM.off();
          closeBtn = false;

        if(paginationMove){
          movePaginationBack();
        }  
      }
  }); 
      
jRes.addFunc({
    breakpoint: 'large',
    enter: function() {
      $('.imagezoom').okzoom({
       // scaleWidth: 1000,
        backgroundRepeat: "repeat",
        width: 200,
        height: 200
      });
    }
});

});



/*! Sort box on collection page */

jQuery(document).ready(function($){

  $(window).load(function(){

$('.sort-by').on('change', function () {

  var url = $(this).val(); // get selected value

         if (url) { // require a URL
              window.location = '?o='+url; // redirect
          }
      });

});
});

/*! Custom select styling */

jQuery(document).ready(function($){

     $('.sort-by').customSelect();

      /*! Fade in the sort dropdown */

     $(window).load(function(){

        $(".sort-by").fadeIn("slow");
        $(".sort-by").css("display","inline");

      });
    });




/*! For the carousel on the artist page */

jQuery(document).ready(function($){

  jQuery(document).ready(function($) {
        $(".royalSlider").royalSlider({
            autoScaleSliderWidth: 960,
            autoScaleSliderHeight: 750,
            keyboardNavEnabled: true,
            imageAlignCenter: true,
            arrowsNavAutoHide: true,
            arrowsNavHideOnTouch: true
        });
    });
});


/*! For the alphabetical list */

jQuery(document).ready(function($){

var list = { letters: [] };
$("#list").children("li").each(function(){
    var itmLetter = $(this).text().substring(0,1).toUpperCase();
    if (!(itmLetter in list)) {
        list[itmLetter] = [];
        list.letters.push(itmLetter);
    }
    list[itmLetter].push($(this));
});
list.letters.sort();
$("#list").empty();
$.each(list.letters, function(i, letter){
    list[letter].sort(function(a, b) {
        return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
    });
    var ul = $("<ul/>");
    $.each(list[letter], function(idx, itm){
        ul.append(itm);
    });
    $("#list").append($("<li/>").append($("<a/>").attr("name", letter.toLowerCase()).addClass("title").html(letter)).append(ul));
});
});


/*! For the isotope layout on the artwork page */

jQuery(document).ready(function($){

      var $containerArtwork = $('#sortArtwork');

     $containerArtwork.imagesLoaded( function(){
       // initialize Isotope

          $containerArtwork.isotope({
          // options...
          resizable: false, // disable normal resizing
          // set columnWidth to a percentage of container width
            masonry: { columnWidth: $containerArtwork.width() / 4 }
        });

      // update columnWidth on window resize
      $(window).smartresize(function(){
        $containerArtwork.isotope({
          // update columnWidth to a percentage of container width
          masonry: { columnWidth: $containerArtwork.width() / 4 }
        });
      });

});

});


/*! For the isotope layout on the collection page */

jQuery(document).ready(function($){
     var $container = $('#sort');

     $(window).resize(function(){
        var current_width = $(window).width();
    });

      if(current_width < 1168){

        isotope_columns = 2;
      }

      else {isotope_columns = 3;}

    $container.imagesLoaded( function(){

        $container.show();

          $container.isotope({
              resizable: false, // disable normal resizing
              itemSelector : '.box-ms',
              layoutMode : 'masonry',
             masonry: {
            columnWidth: $container.width() / isotope_columns
          },
          animationEngine : 'best-available'
        });

});

// update columnWidth on window resize
$(window).smartresize(function(){

  var current_width = $(window).width();

    if(current_width < 1168){

        isotope_columns = 2;
      }

      else {isotope_columns = 3;}

  $container.isotope({
    // update columnWidth to a percentage of container width
    masonry: { columnWidth: $container.width() / isotope_columns }
  });

});

});
