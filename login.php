<?php require 'requires/head.php'; ?>
<body class="tinder-background">
    <?php require 'requires/header-nav.php' ?>
    <div class="wrapper">
        <div class="container">
            <img src="./images/logo-icon-colored.svg" alt="colored-logo"> <br>
            <form action="" method="POST">
                <label for="gmail">Gmail</label><br>
                <input type="email" name="gmail"><br>
                <label for="senha">Senha</label><br>
                <input type="password" name="senha"><br>
                <button type="submit" class="button-enter">ENTRAR</button><br>
                <a href="cadastro.php">Ainda não tem uma conta? Crie uma!</a>
            </form>
        </div>
    </div>
</body>
</html>