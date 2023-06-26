<?php 

  require './database/connect.php';

  if(isset($_POST['cadastrar-button'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $description = $_POST['description'];
    $foto1 = $_POST['photo1'];
    $foto2 = $_POST['photo2'];
    $foto3 = $_POST['photo3'];
    $localizacao = $_POST['localizacao'];
    $sexo = $_POST['sexo'];
    $preferencia = $_POST['preferencia'];
    $idade = $_POST['idade'];

    $query = "INSERT INTO user (User_Name, User_Email, User_Pass, User_Gender, User_Age, User_Location, User_Preference, User_Description, User_Photo1, User_Photo2, User_Photo3) VALUES ('$nome', '$email', '$senha', '$sexo', '$idade', '$localizacao', '$preferencia', '$description', '$foto1', '$foto2', '$foto3')";
    
    $duplicidade = "SELECT * FROM user WHERE User_Email = '$email'";
    
    $result = mysqli_query($mysqli, $duplicidade);
    
    if($result && mysqli_num_rows($result) == 0){
      if(mysqli_query($mysqli, $query)){
        echo "<script>alert('Conta Criada com sucesso!')</script>";
        header("Location: login.php");
      }else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
      }

    }
    else{
      echo "<script>alert('Essa conta já existe')</script>";
    }

  }
?>
<?php
  require 'requires\head.php';
?>
<body class="tinder-background">
<?php require 'requires/header-nav.php' ?>
<div class="wrapper">
  <div class="container-cadastro">
    <form action="cadastro.php" method="POST">
      <div class="left-cad">
        <div class="photos">
          <h3>Suas Fotos:</h3>
          <div class="photo-1">
            <img src="" id="photo1" alt="">
            <input type="file" class="float-left-cadastro" name="photo1" id="photo-up1" accept="Image/*" require>
          </div> 
          <div class="photo-2">
            <img src="" id="photo2" alt="">
            <input type="file" class="float-left-cadastro" name="photo2" id="photo-up2" accept="Image/*"> 
          </div>
          <div class="photo-3">
            <img src="" id="photo3" alt="">
            <input type="file" class="float-left-cadastro" name="photo3" id="photo-up3" accept="Image/*"> 
          </div>
        </div>
        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" id="localizacao" require>
        <div class="three-grid">
          <div class="grid-1">
            <label for="sexo">Sexo:</label><br>
            <select name="sexo" id="sex" require>
              <option value="Homem">Homem</option>
              <option value="Mulher">Mulher</option>
            </select>
          </div>
          <div class="grid-2">
            <label for="preferencia">Preferência:</label><br>
            <select name="preferencia" id="pref" require>
              <option value="Homem">Homem</option>
              <option value="Mulher">Mulher</option>
              <option value="Todos">Todos</option>
            </select>
          </div>
          <div class="grid-3">
            <label for="idade">Idade:</label><br>
            <input type="number" name="idade" id="idade" require>
          </div>
        </div>
      </div>
      <div class="right-cad">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" require>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" require>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" require>
        <label for="description">Sobre você</label>
        <textarea name="description" class="sobre-voce" id="descricao" cols="30" rows="10" require></textarea>
      </div>
      <div class="buttons-form clear">
        <button type="submit" class="button-enter" id="cadastrar-button" name="cadastrar-button">Cadastrar</button>
      </div>
    </form>
  </div>
</div>
<?php require 'requires/footer.php' ?>
