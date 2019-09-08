export { Pessoas };

class Pessoas{
    constructor(){
    }

    
    showHora(){
        let now = new Date();
        let hora = now.getHours();
        let minuto = now.getMinutes();
        let segundos = now.getSeconds();

        return `${hora} : ${minuto} : ${segundos}`;
    }

}