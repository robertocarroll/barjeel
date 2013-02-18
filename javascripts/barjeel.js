
/*! For finding the current browser width */


var current_width;
var isotope_columns = null;

jQuery(document).ready(function($){

      current_width = $(window).width(); 
      $('.attachment-homepage-thumb').width('100%');
      $('.attachment-homepage-thumb').height('auto');
    
  });

 





/*! For the magnifying glass on the artwork */

jQuery(document).ready(function ($) {

 if(current_width > 768){

      $('.imagezoom').okzoom({
        scaleWidth: 1200,
        backgroundRepeat: "repeat",
        width: 200,
        height: 200
      });

       }

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

       $('.filter-by').customSelect();

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

      var $containerArtwork = $('#sortArtwork')

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


/*! For the isotope layout on the artwork page */

jQuery(document).ready(function($){
    
    var $container = $('#sort');

     $(window).resize(function(){  
        var current_width = $(window).width();
    });



      if(current_width < 1068){

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

    if(current_width < 1068){

        isotope_columns = 2;
      }

      else {isotope_columns = 3;}

  $container.isotope({
    // update columnWidth to a percentage of container width
    masonry: { columnWidth: $container.width() / isotope_columns }
  });


});


$('#sort').isotope({
  getSortData : {
    title : function ( $elem ) {
      return $elem.find('.artwork-title').text();
    },
    artist : function ( $elem ) {
      return $elem.find('.artist-name').text();
      
//      $("#searchquery").text().split(/ +/);
      
    }
  }
});


$('.sort-by').change(function(){
  var sortName = $(".sort-by").val();
  $('#sort').isotope({ sortBy : sortName });
  return false;
});


});

/* this is for the hover on the category page

jQuery(document).ready(function($){
    $(".category-collection").hover(
        function() { $(this).addClass("hover"); },
        function() { $(this).removeClass("hover"); }
    );
});

*/



		
