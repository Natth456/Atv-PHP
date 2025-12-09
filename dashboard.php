<?php
session_start();

// Sem sessão → manda para login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

require_once "UsuarioDAO.php";

$userDAO = new UsuarioDAO();
$usuarios = $userDAO->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>

    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            background: #fff;
            border-collapse: collapse;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #eaeaea;
        }

        a.edit-btn {
            background: #0077ff;
            padding: 6px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a.edit-btn:hover {
            background: #005bd1;
        }

        .top-bar {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
        }

        .logout-btn {
            background: #ff3b3b;
            padding: 8px 14px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background: #d12c2c;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
        <a class="logout-btn" href="logout.php">Sair</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php
        if (!empty($usuarios)) {
            foreach ($usuarios as $user) {
                echo "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['nome']}</td>
                    <td>{$user['email']}</td>
                    <td>
                        <a class='edit-btn' href='edit_user.php?id={$user['id']}'>Editar</a>
                    </td>
                </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum usuário encontrado.</td></tr>";
        }
        ?>
    </table>

</body>
</html>