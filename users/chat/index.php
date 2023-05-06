<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">        
</head>
<body>
    <div class="chat-app">
        <div class="left-container" style="color: white">
          <div class="search-container">
            <input type="text" placeholder="Search...">
            <button><i class="fa fa-search"></i></button>
          </div>
          <ul class="friends-list">
            <?php
                    $user_id=$_SESSION['user_id'];
                    $sql="SELECT * from chatroom where user1=$user_id or user2=$user_id;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                          $friend;
                          if($row['user1']==$user_id)
                            $friend=$row['user2'];
                          else
                            $friend=$row['user1'];
                          echo '
                            <li class="friend">
                              <img src="https://dummyimage.com/50x50/000/fff" alt="Profile Picture">
                              <div class="friend-info">
                                <h4>';
                                $sql = "select * from users where user_id = $friend;";
                                $result1=mysqli_query($conn,$sql);
                                $row1 = mysqli_fetch_array($result1);
                                echo $row1['name'];
                                echo '</h4>
                                <p>';
                                echo $row['last_msg'];
                                echo '</p>
                              </div>
                            </li>
                          ';
                        }
                    }
                ?>
          </ul>
        </div>
        <div class="chat-container">
          <div class="chat-header">
            <img src="https://dummyimage.com/50x50/000/fff" alt="Profile Picture">
            <?php
                    $user_id=$_SESSION['user_id'];
                    $friend = $_SESSION['friend'];
                    echo '
                    <h3 style="color:white">';
                    $sql = "select * from users where user_id = $friend;";
                    $result1=mysqli_query($conn,$sql);
                    $row1 = mysqli_fetch_array($result1);
                    echo $row1['name'];
                    echo '</h3>
                    </div>
                    <div class="chat-messages">';
                    $sql="SELECT * from chatroom where (user1=$user_id and user2=$friend)
                    or (user1=$friend and user2=$user_id);";
                    $result=mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    $room = $row['room_id'];
                    $sql = "SELECT * from messages where room_id = $room;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                          if($row['sender']==$user_id)
                            echo '<div class="message">';
                          else
                            echo '<div class="message received">';
                            echo '
                                <p>' . $row['msg'] . '</p>
                              </div>
                          ';
                        }
                    }
                ?>
                </div>
          <div class="chat-input">
            <form>
                <input type="text" placeholder="Type your message here">
                <button type="submit">Send</button>
            </form>
          </div>
        </div>
      </div>
    <script src="script.js"></script>  
</body>
</html>