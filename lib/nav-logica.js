export { modalLogin }

const modalLogin = () => {
    $(document).ready(function(){
        var modalLogin = $('div#modalLoginNav');
        $('#loginInicialNav').on('click', function(e){
            e.preventDefault();
            modalLogin.toggle();
        })
    });
}
