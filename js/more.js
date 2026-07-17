$(document).ready(function() {
(function(){
    var showChar = 20;
    var ellipsestext = "...";
    
    $('.truncate').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content;    
            var html = '<div class="truncate-text" style="display:block">' + c + '<span class="moreellipses">' + ellipsestext + '&nbsp;&nbsp;<a href="" class="moreless more">more</a></span></span></div><div class="truncate-text" style="display:none">' + h + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="moreless less">Less</a></span></div>';
 
            $(this).html(html);
        }
 
    });
 
    $(".moreless").click(function(){
        var thisEl = $(this); 
        if(thisEl.hasClass("less")) {
            thisEl.closest('.truncate-text').prev('.truncate-text').toggle();
            thisEl.closest('.truncate-text').slideToggle();
        } else {
            thisEl.closest('.truncate-text').toggle();
            thisEl.closest('.truncate-text').next('.truncate-text').fadeToggle();
        }
        return false;
    });
    /* end iffe */
    }());

/* end ready */    
});