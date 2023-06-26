<?php require 'requires/head.php' ?>
<body class="tinder-background-sideshadow">
    <?php require 'requires/header-nav.php' ?><br><br>
    <aside class="sidebar">
        <ul>
            <li><a href="#">Meus Matches</a></li><br><br>
            <li><a href="#">Conversas</a></li><br><br>
            <li><a href="index.php">Editar Perfil</a></li><br><br>
            <li><a href="index.php">Deletar Perfil<i class="fa-sharp fa-solid fa-person-walking-arrow-right"></i></a></li><br><br>
            <li><a href="index.php">Sair</a></li>
            fa <i class="far fa-starfighter"></i>
        </ul>
    </aside>
    <main>
        <section>
        <div class="card">
      <div class="card-image">
          <img src="https://picsum.photos/600/800" alt="Card Image" id="photoimg">
        <div class="card-text">
         <p><h2 id="name">Joe Doe<span id="age">, 21</span></h2><button class="info-btn"><i class="fas fa-info-circle"></i></button></p>
        </div>
      </div>  
      <div id="description">

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vero sed exercitationem, voluptatem molestiae fugiat laudantium culpa iusto repellat asperiores quia accusantium? Iusto voluptates tenetur minima quis? Fugiat, nesciunt tempora?.</p>
      </div>
      
      <div class="card-buttons">
        <button class="dislike-btn"><i class="fas fa-times"></i></button>
        <button class="like-btn"><i class="fas fa-heart"></i></button>
      </div>
    </div>
        </section>
    </main>
<?php require 'requires/footer.php' ?>