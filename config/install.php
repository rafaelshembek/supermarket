<?php
    include_once('config.php');
    //-------------------------------------
    //install a base de dados

    //-------------------------------------
    //conectar ao servidor
    $ligacao = new PDO("mysql:$host", $user, $pass);

    //-------------------------------------
    //criar a base de dado
    $motor = $ligacao->prepare("CREATE DATABASE $baseDado");
    $motor->execute();
    $ligacao = null;

    echo '<p>Base de dado criada com sucesso!</p>';

    //-------------------------------------
    //conectar com a base de dado
    $ligacao = new PDO("mysql:dbname=$baseDado;host=$host", $user, $pass);

    //-------------------------------------
    //Criações da tabelas

    //-------------------------------------
    //criar tabela produto
    $sql = "CREATE TABLE produto(
        id_produto             INT NOT NULL PRIMARY KEY,
        nome_produto           VARCHAR(30),
        preco                  decimal(5,2),
        descicao               text
    )";
    $motor = $ligacao->prepare($sql);
    $motor->execute();

    echo '<p>table PRODUTO create </p>';

    //-------------------------------------
    //criar tabela descrição
    $sql = "CREATE TABLE categoria(
        id_categoria        INT NOT NULL PRIMARY KEY,
        id_produto             INT NOT NULL,
        nome_categoria              VARCHAR(200),
        FOREIGN KEY(id_produto) REFERENCES produto(id_produto) ON DELETE CASCADE
    )";
    $motor = $ligacao->prepare($sql);
    $motor->execute();

    echo '<p>table CATEGORIA create </p>';
    //-------------------------------------
    //criar tabela imagem_produto
    $sql = "CREATE TABLE image_produto(
        id_image        INT NOT NULL PRIMARY KEY,
        id_produto      INT NOT NULL,
        image_produto   VARCHAR(200),
        FOREIGN KEY(id_produto) REFERENCES produto(id_produto) ON DELETE CASCADE
        )";
    $motor = $ligacao->prepare($sql);
    $motor->execute();

    echo '<p>table IMAGEM_PRODUTO create </p>';
    $ligacao = null;
?>