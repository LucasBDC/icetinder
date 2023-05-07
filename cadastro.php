<?php
  require 'requires\head.php';
?>
<body class="tinder-background">
<?php require 'requires/header-nav.php' ?>
<div class="wrapper">
  <div class="container-cadastro">
    <form action="">
      <div class="left-cad">
        <div class="photos">
          <h3>Suas Fotos:</h3>
          <div class="photo-1">
            <img src="" id="photo1" alt="">
            <input type="file" class="float-left-cadastro" name="photo" id="photo-up1" accept="Image/*">
          </div> 
          <div class="photo-2">
            <img src="" id="photo2" alt="">
            <input type="file" class="float-left-cadastro" name="photo" id="photo-up2" accept="Image/*"> 
          </div>
          <div class="photo-3">
            <img src="" id="photo3" alt="">
            <input type="file" class="float-left-cadastro" name="photo" id="photo-up3" accept="Image/*"> 
          </div>
        </div>
        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" id="localizacao">
        <div class="three-grid">
          <div class="grid-1">
            <label for="sexo">Sexo:</label><br>
            <select name="sexo" id="sex">
              <option value="homem">Homem</option>
              <option value="mulher">Mulher</option>
            </select>
          </div>
          <div class="grid-2">
            <label for="preferencia">Preferência:</label><br>
            <select name="preferencia" id="pref">
              <option value="homem">Homem</option>
              <option value="mulher">Mulher</option>
              <option value="todos">Todos</option>
            </select>
          </div>
          <div class="grid-3">
            <label for="idade">Idade:</label><br>
            <input type="number" name="idade" id="idade">
          </div>
        </div>
      </div>
      <div class="right-cad">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <label for="description">Sobre você</label>
        <textarea name="description" class="sobre-voce" id="description" cols="30" rows="10"></textarea>
      </div>
      <div class="buttons-form clear">
        <button type="submit" class="button-enter" id="cadastrar-button">Cadastrar</button>
      </div>
    </form>
  </div>
</div>
<?php require 'requires/footer.php' ?>
