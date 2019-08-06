export { modalLogin }

const modalLogin = () => {
    $(document).ready(function(){
        var modalLogin = $('div#modalLoginNav');
        $('#loginInicialNav').on('click', function(e){
            e.preventDefault();
            modalLogin.toggle();
        })
    });
    $('#form-login-inicial').on('submit', function(e){
        e.preventDefault();
        // var fieldEmail = $('#email').val();
        var url = './logica/verify_login.php';
        var dataForm = $('#form-login-inicial').serialize();
        var reloadIcon = $('.loading_icon_login i');
        $.ajax({
            method: "POST",
            url: url,
            data: dataForm
        })
        .done(function(e){
            reloadIcon.show();
            setTimeout(() => {
                window.location = './';
            }, 500);
        })
    })
}
