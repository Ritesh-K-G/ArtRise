<?php
    session_start();
    include "../db_connect.php";
    if(isset($_GET['id'])) {
        // $id=$_GET['id'];
        // $word = $_SESSION['ps_id'];
        // $sql = "DELETE from books where ticket_code = '$id' and ps_id = '$word';";
        // if($conn->query($sql)== true){
        //     echo '<script> alert("Critic verified");setTimeout(()=>{window.location.replace("admin.php");},500); </script>';+
        //     exit;
        // }
        // else{
        //     echo "ERROR: $sql <br> $conn->error";
        // }
        // header("Location:admin.php");
        // exit;
        echo '<script> alert("hello");setTimeout(()=>{window.location.replace("admin.php");},500); </script>';
    }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="../assets/img/logo1.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============--> 
        <link rel="stylesheet" href="../assets/css/styles.css">

        <link rel="stylesheet" href="admin.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <title>ArtRise</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="../assets/img/logo1.png" alt="" class="nav__logo-img">
                    ArtRise
                </a>
                
            </nav>
        </header>
        <!--==================== CATEGORY ====================-->
        <main class="main">
            <section class="section category">
                <div class="data" id="admin">
                    <h1 class="welcome">ADMIN SECTION</h1>
                    <h2>Critics Registration List</h2>
                    <table border="1" cellpadding="0">
                        <?php
                            $sql="SELECT * from critics;";
                            $result=mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo 
                                '<thead>
                                    <tr>
                                        <th>Critics Id</th>
                                        <th>Name</th>
                                        <th>Critic Type</th>
                                        <th>Qualification</th>
                                        <th>Contact</th>
                                        <th>About</th>
                                        <th></th>
                                    </tr>
                                </thead>';
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>" .
                                    "<td>" . $row["critics_id"]. "</td>".
                                    "<td>" . $row["name"]. "</td>".
                                    "<td>" . $row["critic_type"]. "</td>".
                                    "<td>" . $row["qualification"]. "</td>".
                                    "<td>" . $row["contact"]. "</td>".
                                    "<td>" . $row["about"]. "</td>".
                                    "<td> <a href='admin.php?id=".$row['critics_id']."'
                                            class='dltscd'>Approve</a>  
                                    </td>".
                                    "</tr>";
                                }
                            }
                            else
                                echo '<h3>No works as of now!!!</h3>';
                            mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </section>
        </main>        
        <!--=============== MAIN JS ===============-->
        <script src="../assets/js/main.js"></script>
    </body>
</html>