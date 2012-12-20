


/*! For the magnifying glass on the artwork */

 jQuery(document).ready(function ($) {
      $('.imagezoom').okzoom({
        scaleWidth: 1200,
        backgroundRepeat: "repeat",
        width: 200,
        height: 200
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

/* this is for the hover on the category page

jQuery(document).ready(function($){
    $(".category-collection").hover(
        function() { $(this).addClass("hover"); },
        function() { $(this).removeClass("hover"); }
    );
});

*/
		
