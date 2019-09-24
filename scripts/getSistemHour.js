
export class Pessoas{
    
    
    showHora(){
        let _now = new Date();
        let _hora = _now.getHours();
        let _minuto = _now.getMinutes();
        let _segundos = _now.getSeconds();

        return `${_hora} : ${_minuto} : ${_segundos}`;
    }

}