    <?php
      session_start();
      require './database/connect.php';

      $user_id = $_SESSION['User_ID'];  
      
      if (!isset($_SESSION['User_ID'])) {
        header("Location: login.php");
        exit();
    }
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }

    if(isset($_POST['delete'])){
      $delete = "DELETE FROM user WHERE User_ID = $user_id;";
      session_unset();
      session_destroy();
      header("Location: login.php");
      exit();
    }

    $query = "SELECT User_Gender, User_Preference FROM user WHERE User_ID = '$user_id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
      $user = mysqli_fetch_assoc($result);
      $userGender = $user['User_Gender'];
      $userPreference = $user['User_Preference'];
      // Construct the query to fetch users based on gender preference
      if ($userPreference === "Todos") {
        $query = "SELECT * FROM user WHERE User_Preference = '$userGender' AND User_ID NOT IN (SELECT Swipe_SwipedOn FROM Swipe WHERE Swipe_Swiper = '$user_id')";
      } else {
        $query = "SELECT * FROM user WHERE (User_Preference = '$userGender' OR User_Preference = 'Todos') AND User_Gender = '$userPreference' AND User_ID NOT IN (SELECT Swipe_SwipedOn FROM Swipe WHERE Swipe_Swiper = '$user_id')";
      }

      // Execute the query
      $result = mysqli_query($mysqli, $query);

      if ($result) {
        // Fetch all users and store them in an array
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $users[] = $row;
        }
        $jsonUsers = json_encode($users);
      } else {
        echo "Error executing the query: " . mysqli_error($mysqli);
      }
    } else {
      echo "Error retrieving user information: " . mysqli_error($mysqli);
    }

    
    
    
    ?>

<?php require 'requires/head.php' ?>
<body class="tinder-background-sideshadow">
    <?php require 'requires/header-nav.php' ?><br><br>
    <aside class="sidebar">
        <ul>
            <li><a  href="meusmatches.php">Meus Matches</a></li><br><br>
            <li>
              <form action="landingpage.php" method="POST">
                <button type="submit" name="delete" style="background: none; border: none; color: white; padding: 20px; font-size: 1.5em; text-transform: uppercase; font-weight: 800; cursor: pointer;">DELETAR PERFIL</button><br><br>
                <button type="submit" name="logout" style="background: none; border: none; color: white; padding: 20px; font-size: 1.5em; text-transform: uppercase; font-weight: 800; cursor: pointer;">SAIR</button>
              </form>
            </li>
        </ul>
    </aside>
    <main> 
        <?php 
          if (!empty($users)) {
            $currentCard = $users[0]; // Get the first user from the array
            echo '<section style="width: 80%; display: flex; align-self: end; justify-content: center;">
                    <div class="card">
                      <div class="card-image">
                          <img src="https://picsum.photos/600/800" alt="Card Image" id="photoimg">
                        <div class="card-text">
                        <p><h2 id="name">' . $currentCard['User_Name'] . '<span id="age">, ' . $currentCard['User_Age'] . '</span></h2><button class="info-btn"><i class="fas fa-info-circle"></i></button></p>
                        </div>
                      </div>  
                      <div id="description">
                        <p>' . $currentCard['User_Description'] . '</p>
                      </div>
                    
                      <div class="card-buttons">
                        <form action="landingpage.php" method="POST">
                          <button type="submit" name="dislike" class="dislike-btn"><i class="fas fa-times"></i></button>
                          <button type="submit" name="like" class="like-btn"><i class="fas fa-heart"></i></button>
                        </form>
                      </div>
                    </div>
                  </section>';
          } else {
            echo '<section style="width: 80%; display: flex; align-self: end; align-item: center;height: 500px ;justify-content: center;"><p style="align-self: center; color: white;">Nenhum Perfil Encontrado</p></section>';
          }
          if (isset($_POST['like']) || isset($_POST['dislike'])) {
            if(!empty($users)){
              $currentCard = $users[0];
              $action = isset($_POST['like']) ? 'Like' : 'Dislike';
              $ida = $currentCard['User_ID'];
              $query = "INSERT INTO Swipe (Swipe_Swiper, Swipe_SwipedOn, Swipe_Res) VALUES ('$user_id', '$ida', '$action')";
              $result = mysqli_query($mysqli, $query);
              if (!$result) {
                echo "Error executing the query: " . mysqli_error($mysqli);
              } else {
                // Fetch the users again
                $query = "SELECT * FROM user WHERE User_Preference = '$userGender' AND User_ID NOT IN (SELECT Swipe_SwipedOn FROM Swipe WHERE Swipe_Swiper = '$user_id')";
                $result = mysqli_query($mysqli, $query);
            
                if ($result) {
                  // Fetch all users and store them in an array
                  $users = array();
                  while ($row = mysqli_fetch_assoc($result)) {
                    $users[] = $row;
                  }
                  $jsonUsers = json_encode($users);
                } else {
                  echo "Error executing the query: " . mysqli_error($mysqli);
                }
            
                // Remove the current card from the array if it exists
                if (!empty($users)) {
                  array_shift($users);
                }
            
                if (count($users) > 0) {
                  // Fetch the next card from the array
                  $nextCard = $users[0];
                } else {
                  
                }
              }
            }
          } 
        ?>
    </main>
    <?php require 'requires/footer.php' ?>