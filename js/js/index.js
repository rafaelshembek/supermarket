import { modalLogin } from "../../lib/nav-logica.js";
import { searchInput, showModal } from "../../lib/search.js";
import { nome } from "../../lib/teste.js";
import { myNetWork } from "../../lib/analise_network.js";

// console.log(nome);
var internet = myNetWork();
internet;
// logica para o search do input supermercado
searchInput();
showModal();
// ==========================
modalLogin(); //modal input login