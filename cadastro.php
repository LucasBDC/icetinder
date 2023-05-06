<?php
  require 'requires\head.php';
?>
<body class="tinder-background">
<?php require 'requires/header-nav.php' ?>
<div class="wrapper">
  <div class="container-cadastro">
    <form action="">
    <div class="left-cad">
        <input type="file" class="float-left-cadastro" name="photo" id="" accept="Image/*"> 
        <input type="file" class="float-left-cadastro" name="photo" id="" accept="Image/*"> 
        <input type="file" class="float-left-cadastro" name="photo" id="" accept="Image/*"> 
        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" id="">
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="">
          <option value="homem">Homem</option>
          <option value="mulher">Mulher</option>
        </select>
        <label for="preferencia">Preferência</label>
        <select name="preferencia" id="">
          <option value="homem">Homem</option>
          <option value="mulher">Mulher</option>
          <option value="todos">Todos</option>
        </select>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="">
      </div>
      <div class="right-cad">
        <label for="nome">Nome:</label>
        <input type="text" name="nome">
        <label for="email">Email:</label>
        <input type="email" name="email">
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <label for="description">Sobre você</label>
        <input type="text" name="description" id="">
      </div>
      <div class="buttons-form clear">
       <button type="submit" class="button-enter">Cadastrar</button>
       </div>
    </form>
  </div>
</div>
</body>
</html>