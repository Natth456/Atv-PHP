<?php
session_start();

require_once "UsuarioDAO.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $senha = $_POST["password"];

    $userDAO = new UsuarioDAO();
    $user = $userDAO->login($email, $senha);

    if ($user) {
        // Login OK → salvar dados na sessão
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_nome"] = $user["nome"];
        $_SESSION["user_email"] = $user["email"];

        header("Location: dashboard.php");
        exit;
    } else {
        // Login inválido
        header("Location: login.php?error=1");
        exit;
    }
}