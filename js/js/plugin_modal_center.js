(function ($) {
    jQuery.fn.modal_center = function () {
        // obtem a posição do elemento
        var modal = $(this).position();
        var top = Math.floor(modal.top);
        var left = Math.floor(modal.left);

        //largura da pagina
        var document_width = $(document).width();
        var documet_height = $(document).height();
        // configura a posição do elemento
        $(this).show(function(){
            $(this).css({
                'left': document_width / 3,
                'top': top / 4 + $(window).scrollTop()
            })
        })
    };
})(jQuery);