<?php 
include('db/connection.php');

$flashMessage = $_GET['flashMessage'] ?? '';
$messageType = $_GET['messageType'] ?? '';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
  </head>
  <body class="container">
  <?php if ($flashMessage && $messageType): ?>
        <div id="flash-message" class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
            <?= $flashMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            // Adiciona script para fechar a mensagem automaticamente após 3 segundos
            setTimeout(function() {
                document.getElementById('flash-message').style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>
    <div id="form">
        <h1 id="heading">Login</h1><br>
        <form name="form" action="db/signup.php" method="POST">
            <i class="fa fa-user fa-lg"></i>    
            <input type="email" id="email" name="email" placeholder="Enter Email" required></br></br>
            <i class="fa-solid fa-lock fa-lg"></i>
            <input type="password" id="pass" name="password" placeholder="Create Password" required></br></br>
            <input type="hidden" name="action" value="login">
            <br>
            <a href="register.php">Ou cadastre-se</a>
            <input type="submit" id="btn" value="Login" name="submit"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
