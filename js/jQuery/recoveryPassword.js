$(document).ready(function(e){
    var $itemsHtml = '';
    var sendEmail = false;
    var showMessageSuccessRecovery = $('.showSuccessMessage').hide();
    var showMessageWarningRecovery = $('.showWarningMessage').hide();
    var showMessageDangerRecovery = $('.showDangerMessage').hide();
    $('#formRecoveryPassword').on('submit', function(e){
        e.preventDefault();
        var fieldsInputs = this.elements;
        if(fieldsInputs.email.value == ""){
            $itemsHtml = '</div class="alert alert-success text-center">O campo não foi preenchido</div>';
            showMessageDangerRecovery.show();
            $('.showDangerMessage').html($itemsHtml);
            setTimeout(() => {
                showMessageDangerRecovery.hide();
            }, 5000);
            $('#email').val() == "";
        }else if(fieldsInputs.email.value)
        {
            ajax('../logica/recuperar_senha.php').done(
                function(result){
                    if(result == 0){
                        $itemsHtml = '</div class="alert alert-warning text-center">Esse Email não existe em nosso banco de dado</div>';
                        
                        showMessageWarningRecovery.show();
                        $('.showWarningMessage').html($itemsHtml);
                        setTimeout(() => {
                        showMessageWarningRecovery.hide();
                        }, 5000);
                    }else{
                        $itemsHtml = '</div class="alert alert-success text-center">Uma nova senha de recuperação foi enviado para o seu email</div>';
                        
                        showMessageSuccessRecovery.show();
                        $('.showSuccessMessage').html($itemsHtml);
                        setTimeout(() => {
                        showMessageSuccessRecovery.hide();
                        }, 5000);
                    }
                    $('#email').val("") == "";
                }
            )
            .fail(function(){
                console.log('esta aquir function Fail() ');
            });
        }
    })
})
function ajax(url){
    var fieldForm = $('#formRecoveryPassword').serialize();
    return $.ajax({
        method: 'POST',
        url: url,
        data: fieldForm
    });
}
// console.log(ajax('../logica/recuperar_senha.php'));