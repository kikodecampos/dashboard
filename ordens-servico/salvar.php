<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");

// VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    // VERIFICA CAMPOS OBRIGATÓRIOS
    if (empty($_POST["nome"]) || empty($_POST["cpf"] || strlen($_POST["cpf"] != 14))) {
        $_SESSION["tipo"] = 'warning';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Por favor, preencha os campos obrigatórios.';
        header("Location: ./");
        exit;
    } else {
        // RECUPERA INFORMAÇÕES PREENCHIDAS PELO USUÁRIO
        $pk_cliente = trim($_POST["pk_cliente"]);
        $nome = trim($_POST["nome"]);
        $cpf = trim($_POST["cpf"]);
        $whatsapp = trim($_POST["whatsapp"]);
        $email = trim($_POST["email"]);

        try {
            if (empty($pk_cliente)) {
                $sql = "
                INSERT INTO clientes (nome, cpf, whatsapp, email) VALUES
                (:nome, :cpf, :whatsapp, :email)
                ";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':whatsapp', $whatsapp);
                $stmt->bindParam(':email', $email);
            } else {
                $sql = "
                UPDATE clientes SET
                nome = :nome,
                cpf = :cpf,
                whatsapp = :whatsapp,
                email = :email
                WHERE pk_cliente = :pk_cliente
                ";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':pk_cliente', $pk_cliente);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':whatsapp', $whatsapp);
                $stmt->bindParam(':email', $email);
            }
            // EXECUTA INSERT OU UPDATE ACIMA
            $stmt->execute();

            $_SESSION["tipo"] = 'success';
            $_SESSION["title"] = 'Oba!';
            $_SESSION["msg"] = 'Registro salvo com sucesso!';
            header("Location: ./");
            exit;
        } catch (PDOException $ex) {
            $_SESSION["tipo"] = 'error';
            $_SESSION["title"] = 'Ops!';
            $_SESSION["msg"] = $ex->getMessage();
            header("Location: ./");
            exit;
        }
    }
}
