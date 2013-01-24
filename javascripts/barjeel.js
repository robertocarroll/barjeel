/*! For the magnifying glass on the artwork */

jQuery(document).ready(function ($) {
      $('.imagezoom').okzoom({
        scaleWidth: 1200,
        backgroundRepeat: "repeat",
        width: 200,
        height: 200
      });
    });



/*! For the carousel on the artist page */

jQuery(document).ready(function($){

  $("#carousel-gallery").touchCarousel({        
        itemsPerPage: 1,        
        scrollbar: true,
        scrollbarAutoHide: false,
        scrollbarTheme: "dark",       
        pagingNav: false,
        snapToItems: true,
        scrollToLast: true,
        useWebkit3d: true,        
        loopItems: false
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
    
    $container.imagesLoaded( function(){

        $container.show();

          $container.isotope({
       	      resizable: false, // disable normal resizing
              itemSelector : '.box-ms',
      	       layoutMode : 'masonry',
             masonry: {
            columnWidth: $container.width() / 3 
          },
      	
          animationEngine : 'best-available'
        });

});



// update columnWidth on window resize
$(window).smartresize(function(){
  $container.isotope({
    // update columnWidth to a percentage of container width
    masonry: { columnWidth: $container.width() / 3 }
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



		
