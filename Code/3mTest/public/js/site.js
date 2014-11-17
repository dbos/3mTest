var $overlay = $('<div id="overlay"></div>'),
$modal = $('<div id="modal"></div>'),
$content = $('<div id="content"></div>'),
$close = $('<a id="close" href="#">&#215;</a>');

$modal.hide();
$overlay.hide();
$modal.append($content, $close);

$(document).ready(function(){
    $('body').append($overlay, $modal);
});

var modal=function(settings){
    var method={};
    method.center = function () {
        var top, left;

        top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
        left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

        $modal.css({
            top:top + $(window).scrollTop(), 
            left:left + $(window).scrollLeft()
        });
    };
    method.open = function (settings) {
        $content.empty().append(settings.content);

        $modal.css({
            width: settings.width || 'auto', 
            height: settings.height || 'auto'
        })

        method.center();

        $(window).bind('resize.modal', method.center);

        $modal.show();
        $overlay.show();
    };
    method.close = function () {
        $modal.hide();
        $overlay.hide();
        $content.empty();
        $(window).unbind('resize.modal');
    };
    $close.click(function(e){
        e.preventDefault();
        method.close();
    });
    $overlay.click(function(e){
        method.close();
    });
    return method;
}
