<?php
session_start();

// Se já está logado, manda pro dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #fff;
            padding: 25px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #bbb;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #0077ff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #005cd1;
        }

        .register-link {
            text-align: center;
            margin-top: 5px;
        }

        .register-link a {
            color: #0077ff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>

        <form action="process_login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Senha" required>

            <button type="submit">Entrar</button>
        </form>

        <div class="register-link">
            <a href="register.php">Criar conta</a>
        </div>
    </div>
</body>
</html>