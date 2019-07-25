export function ModalShowDadosMoradia(btn, modal){
    $(btn).on('click', function(e){
        // console.log(e);
        $(modal).modal({
            centered: true
        }).modal('show');
    });
}