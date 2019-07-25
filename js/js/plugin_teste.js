(function($){
    $.fn.nomePlugin = function(ops){
        var padrao = {
            url: '',
            type: '',
            dataType: ''
        }
        var opcoes = $.extend({}, padrao, ops);
        return this.ready(function(event){
            /**
             * codigo do $.ajax({})
             */
            var $items = '';
            $.ajax({
                url: opcoes.url,
                type: opcoes.type,
                dataType: opcoes.dataType
            }).done(function(data){
                for(var i = 0; i < data.length; i++){
                    if(data[i] == null){
                        console.log("sem informações no banco de dado");
                    }else{
                        $items += '<tr>';
                        $items += '<th scope="row">' + data[i]["nome_produto"] + '</th>';
                        console.log(data.nome_produto);
                        console.log('okokok');
                        // $items += '<td>'+ data.aluno[i]["nome"]+ '</td>';
                        // $items += '<td>' + data.aluno[i]["idade"]+ '</td>';
                        // $items += '<td>' + data.aluno[i]["email"] + '</td>';
                        $items += '</tr>';
                    }
                }
                $('.box_left').html($items);
            });
        });// fim da função ajax()
    }
})(jQuery);