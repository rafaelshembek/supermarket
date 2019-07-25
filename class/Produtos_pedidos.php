<?php
namespace Produtos_pedidos;
require_once('Insert_DB.php');
// Class adicionar produtos na base de dados tabela "pedidos"
class Produtos
{
    private $id;
    private $id_usuario;
    private $id_loja;
    private $nome_produto;
    private $descricao;
    private $categoria;
    private $preco;
    private $valor_total;
    private $data_pedido;

    public function __construct($id, $id_usuario, $id_loja, $nome_produto, $descricao, $categoria, $preco, $valor_total, $data_pedido)
    {
        $this->setId($id);
        $this->setId_usuario($id_usuario);
        $this->setId_loja($id_loja);
        $this->setNome_produto($nome_produto);
        $this->setDescricao($descricao);
        $this->setCategoria($categoria);
        $this->setPreco($preco);
        $this->setValor_total($valor_total);
        $this->setData_pedido($data_pedido);
    }

    public function tabela_pedidos(){
        $insert = new \Insert_DB();
        $param = array(
            ':idPedidos' => $this->getId(),
            ':id_usuario' => $this->getId_usuario(),
            ':id_loja' => $this->getId_loja(),
            ':produto' => $this->getNome_produto(),
            ':descricao' => $this->getDescricao(),
            ':categoria' => $this->getCategoria(),
            ':preco' => $this->getPreco(),
            ':valor_total' => $this->getValor_total(),
            ':dataPedido' => $this->getData_pedido()
        );
        $insert->exe_insert("INSERT INTO pedidos(idPedidos, id_usuario, id_loja, produto, descricao, categoria, preco, dataPedido) VALUES(:idPedidos, :id_usuario, :id_loja, :produto, :descricao, :categoria, :preco, :valor_total, :dataPedido)", $param);
    }
    // ==================================
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId_usuario()
    {
        return $this->id_usuario;
    }
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    } 
    public function getId_loja()
    {
        return $this->id_loja;
    }
    public function setId_loja($id_loja)
    {
        $this->id_loja = $id_loja;
    } 
    public function getNome_produto()
    {
        return $this->nome_produto;
    }
    public function setNome_produto($nome_produto)
    {
        $this->nome_produto = $nome_produto;
    } 
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    } 
    public function getPreco()
    {
        return $this->preco;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
    public function getData_pedido()
    {
        return $this->data_pedido;
    }
    public function setData_pedido($data_pedido)
    {
        $this->data_pedido = $data_pedido;
    } 
    public function getValor_total()
    {
        return $this->valor_total;
    }
    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;
    }
}

?>