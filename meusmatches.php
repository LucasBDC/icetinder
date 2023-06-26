<?php
    session_start();
    require './database/connect.php';

    $user_id = $_SESSION['User_ID'];  
    
    if (!isset($_SESSION['User_ID'])) {
      header("Location: login.php");
      exit();
  }
  
  $query = "SELECT * FROM swipe WHERE Swipe_Swiper = $user_id;";
  $result = mysqli_query($mysqli, $query);
  if ($result) {
    $user = mysqli_fetch_assoc($result);
    // Construct the query to fetch users based on gender preference
    
  $query = "SELECT * FROM swipe AS s1
  JOIN swipe AS s2 ON s1.Swipe_Swiper = s2.Swipe_SwipedOn AND s1.Swipe_SwipedOn = s2.Swipe_Swiper
  WHERE (s1.Swipe_Res = 'Like' AND s2.Swipe_Res = 'Like')
    AND s1.Swipe_Swiper = $user_id;
  
  ";
    $result = mysqli_query($mysqli, $query);
  } else {
    echo "Error retrieving user information: " . mysqli_error($mysqli);
  }
?>

<?php require 'requires/head.php'; ?>
<body class="tinder-background">
    <?php require 'requires/header-nav.php' ?>
    <div class="wrapper" style="flex-direction: column; gap: 20px;justify-content: center;">
        <div class="textoarea" style="display:flex; align-items:center;">
            <h1 style="color: white;" id="titlewhite">Meus Matches - </h1>
            <a href="landingpage.php" style="color: white; margin: 0 15px; font-size: 1.8rem;">Voltar</a>
        </div>
        <div class="meusmatchesfb" style="display: flex;; width: 90%; flex-wrap: wrap; justify-content: center; align-items: center;">
            <?php 
                if($result && mysqli_num_rows($result) > 0){
                    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);                    
                    foreach ($data as $row) {
                        $sqlline = "SELECT * FROM user WHERE User_ID =" .$row['Swipe_Swiper'].";";
                        $resultado = mysqli_query($mysqli, $sqlline);
                        if($resultado && mysqli_num_rows($resultado) > 0){
                            $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                            foreach($dados as $linha){
                                echo '
                                <div class = "card" style="position: relative; left: 0;">
                                    <div class="card-image">
                                        <img src="https://picsum.photos/600/800" alt="Card Image" id="photoimg">
                                        <div class="card-text">
                                        <p><h2 id="name">' . $linha['User_Name'] . '<span id="age">, ' . $linha['User_Age'] . '</span></h2><button class="info-btn"><i class="fas fa-info-circle"></i></button></p>
                                        </div>
                                    </div>  
                                    <div id="description">
                                        <p>' . $linha['User_Description'] . '</p>
                                    </div>
                                </div>';
                            }
                        }

                    }
                   
                }
                else{
                    echo "<p>Se fufu</p>";
                }
            ?>
        </div>
    </div>
<?php require 'requires/footer.php' ?>