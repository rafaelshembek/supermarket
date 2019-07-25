import { ModalShowDadosMoradia } from "./carrinho.js";
import { CarrinhoApp } from "./carrinhoApp.js";
import { setDadosUsuarioMoradia } from "./setDadosUsuarioMoradiaCarrinho.js";

const main = () => {
    // logica do btn show Modal Cadastra Dados de Moradia
    ModalShowDadosMoradia('#btnShowModalCasdastraMoradia', '.modalCarrinho.ui.modal');
    // ///// logica para submiter os dados de moradia do usuario no banco de dado
    var  myDadosMoradia =  new setDadosUsuarioMoradia();
    myDadosMoradia.dadosMoradia('#formDadosUsuarioCadastrarMoradia');
    
    // ///// logica para arquivos angularjs
    CarrinhoApp();
    
}
main(); // main()