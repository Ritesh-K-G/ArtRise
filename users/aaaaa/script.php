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
                            <li class="friend active">
                              <img src="https://dummyimage.com/50x50/000/fff" alt="Profile Picture">
                              <div class="friend-info">
                                <h4>';
                                $sql = "select * from users where user_id = $friend;";
                                $result1=mysqli_query($conn,$sql);
                                $row1 = mysqli_fetch_array($result1);
                                echo $row1['name'];
                                echo '</h4>
                                <p>Last seen 10 minutes ago</p>
                              </div>
                            </li>
                          ';
                        }
                    }
                    mysqli_close($conn);
                ?>