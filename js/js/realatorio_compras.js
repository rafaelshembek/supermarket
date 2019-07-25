
function printButton(){
    var documentPrint = document.getElementById("pagePrint");
    window.print();
}

$('#btnConfir').on('click', function(){
    confirSendOfBey();
    // alert("OK");
})
function confirSendOfBey(){
    var url = document.location.search;

    $.post('../logica/confirSendOfBey.php'+url)
    .done(function(data){
        alert("O cliente receberar uma alerta sobre o envior das compras");
    })
    .fail(function(err){
        console.log(err);
    })
}