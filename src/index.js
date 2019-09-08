import { Pessoas } from "../scripts/getSistemHour";

var horas = new Pessoas();
setInterval( () => {
   document.getElementById('horanow').innerText = horas.showHora();
}, 1000);