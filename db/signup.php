<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        // Lógica de registro aqui
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // Verifica se a senha e a confirmação são iguais
        if ($password != $cpassword) {
            $_SESSION['flashMessage'] = "Passwords do not match";
            $_SESSION['messageType'] = "error";
            header("Location: ../register.php");
            exit;
        }

        // Hash da senha
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Consulta para verificar se o usuário ou e-mail já existem
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $count_user = $stmt->rowCount();

        if ($count_user == 0) {
            // Usuário e e-mail não existem, pode prosseguir com a inserção
            $stmt = $conn->prepare("INSERT INTO users(username, email, senha) VALUES(:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hash);

            if ($stmt->execute()) {
                // Registro inserido com sucesso, redireciona para o login com uma mensagem na URL
                $_SESSION['flashMessage'] = "User created successfully! You can now login.";
                $_SESSION['messageType'] = "success";
                header("Location: ../login.php");
                exit;
            } else {
                // Erro ao inserir registro
                error_log("SQL Error: " . implode(', ', $stmt->errorInfo()));
                $_SESSION['flashMessage'] = "Error creating user. Please try again.";
                $_SESSION['messageType'] = "error";
                header("Location: ../register.php");
                exit;
            }
        } else {
            // Usuário ou e-mail já existem
            $_SESSION['flashMessage'] = "Username or Email already exists!";
            $_SESSION['messageType'] = "error";
            header("Location: ../register.php");
            exit;
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Lógica de login aqui
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Consulta para verificar se o usuário existe
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['senha'])) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../welcome.php?flashMessage=Login+successful!&messageType=success");
            exit;
        } else {
            // Login falhou
            $_SESSION['flashMessage'] = "Invalid email or password";
            $_SESSION['messageType'] = "error";
            header("Location: ../login.php");
            exit;
        }
    }
}
?>
