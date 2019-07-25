import month_today from "./analise_days";

const forDados = (v) => {
    for(var i = 0; i < v.length; i++){
        if(v[i].length != 0){
            switch(v[i]['nome_dia']){
                case 'Monday':
                    month_today(v[i]);
                break;
                case 'Tuesday':
                break;
                case 'Wednesday':
                break;
                case 'Thursday':
                break;
                case 'Friday':
                break;
                case 'Saturday':
                break;
                case 'Sunday':
                    month_today(v[i]);
                break;
            }
        }else{
            clearInterval();
        }
    }
}
export default forDados;