jQuery(document).ready(function ($) {
                
        $('#slider-code').tinycarousel({ display: 2 });
        
    });




/*! For the magnifying glass on the artwork */

 jQuery(document).ready(function ($) {
      $('.imagezoom').okzoom({
        scaleWidth: 1200,
        backgroundRepeat: "repeat",
        width: 200,
        height: 200
      });
    });

/*! For the boostrap tooltip */

jQuery(document).ready(function($){
  $('a').tooltip()
});


/*! For the isotope layout on the artwork page */

jQuery(document).ready(function($){

var $container = $('#sort');

$container.imagesLoaded( function(){
  $container.isotope({
   	itemSelector : '.box-ms',
  	layoutMode : 'fitRows',
  	animationEngine : 'best-available'
  });
});



var $containerartist = $('#sortartist');

$containerartist.imagesLoaded( function(){
  $containerartist.isotope({
    itemSelector : '.box-ms',
    layoutMode : 'fitRows',
    animationEngine : 'best-available'
  });
});





$('#sort').isotope({
  getSortData : {
    title : function ( $elem ) {
      return $elem.find('.title').text();
    },
    artist : function ( $elem ) {
      return $elem.find('.artist').text();
      
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




		
