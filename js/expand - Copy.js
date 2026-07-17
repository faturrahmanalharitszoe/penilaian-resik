$(function(){
 
    $('[data-toggle]').on('click', function(){
      var id = $(this).data("toggle"),
          $object = $(id),
          className = "open";
      
      if ($object) {
        if ($object.hasClass(className)) {
          $object.removeClass(className)
          $(this).text("1. Pelaksana");
        } else {
          $object.addClass(className)
          $(this).text("1. Pelaksana");
        }
      }
    });
});