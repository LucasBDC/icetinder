<?php require 'requires/head.php'; ?>
<body class="tinder-background">
    <?php require 'requires/header-nav.php' ?>
    <div class="wrapper">
        <div class="container">
            <img src="./images/logo-icon-colored.svg" alt="colored-logo"> <br>
            <form action="" method="POST">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" class="login-input"><br>
                <label for="senha">Senha</label><br>
                <input type="password" name="senha" class="login-input"><br>
                <div class="buttons-form">
                    <button type="submit" class="button-enter">ENTRAR</button><br>
                    <a href="cadastro.php">Ainda não tem uma conta? Crie uma!</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>