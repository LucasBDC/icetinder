<?php

    require_once './database/connect.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $query = "SELECT * FROM user WHERE User_Email = '$email' AND User_Pass = '$senha'";
        
        $result = mysqli_query($mysqli, $query);

        if($result && mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['User_ID'] = $user['User_ID']; 
            header('Location: landingpage.php');
            echo "<script>alert('Bem Vindo ao IceTinder!')</script>";
        }
        else{
            echo "<script>alert('Email ou senha inválidos!')</script>";
            $_POST['email'] = '';
            $_POST['senha'] = '';    
        }
    }

?>
<?php require 'requires/head.php'; ?>
<body class="tinder-background">
    <?php require 'requires/header-nav.php' ?>
    <div class="wrapper">
        <div class="container">
            <img src="./images/logo-icon-colored.svg" alt="colored-logo"> <br>
            <form action="login.php" method="POST">
                <div class="login-inputs">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" class="login-input"><br>
                <label for="senha">Senha</label><br>
                <input type="password" name="senha" class="login-input"><br>
                </div>
                <div class="buttons-form">
                    <button type="submit" name="submit" class="button-enter">ENTRAR</button><br>
                    <a href="cadastro.php">Ainda não tem uma conta? Crie uma!</a>
                </div>
            </form>
        </div>
    </div>
<?php require 'requires/footer.php' ?>