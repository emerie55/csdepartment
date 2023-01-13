<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>
</div>

<!-- Footer Starts Here  -->
<?php 
if(isset($_SESSION['active_chat'])){
    $iconClass = "chatClose";
    $chatDivClass = "chatOpen";
}else{
    $iconClass = "chatOpen";
    $chatDivClass = "chatClose";
}

?>
<i class="fa fa-comments <?php echo $iconClass; ?>" id="openChat">
<p style="font-size:18px;">Chat Us</p>
</i>
<div id="chatDiv" class="<?php echo $chatDivClass; ?>">
    <?php
     if(isset($_SESSION['active_chat'])){
    ?>
        <!-- HTML HERE -->
        <div class="card">
            <div class="card-header bg-primary cardhead" style="color:#fff; padding:10px; font-weight: bold;" >
                <span><i class="fa fa-comments"></i> <span>Chat with Us</span></span>
                <i class="fa fa-close closeChat"></i>
                <span id="aUser" style="display:none;"><?php echo $_SESSION['active_chat']; ?></span>
            </div>
            <div class="card-body cad2">
                <div id="chatDisplay">

                </div>
                <div id="dvSendChat">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Here" id="msg" />
                        <div class="input-group-append"><br><br>
                            <button class="btn btn-primary" id="chatSendBtn">
                                <i class="fa fa-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <button type="submit" name="endchat" class="btn btn-danger" style="width:50%; position:absolute; bottom:10px; right:3px;"> <i class="fa fa-close"></i> End Chat</button>
                    <?php
                        if(isset($_POST['endchat'])){
                            session_unset($_SESSION['active_chat']);
                        }
                    ?>
                </form>
            </div>
        </div>

    <?php
     }else{
    ?>
        <!-- HTML HERE -->
        <div class="card ">
            <div class="card-header bg-primary cardhead" style="color:#fff; padding:10px;">
                <span><i class="fa fa-comments"></i> <span>Chat with Us</span></span>
                <i class="fa fa-close closeChat" style="cursor: pointer;"></i>
            </div>
            <div class="cad card-body" >
                <?php
                    if(isset($_POST['startchat'])){
                        $user_id = $_SESSION['cur_user'];
                        $fullname = $_POST['username'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $queryCheckChat = $con->query("SELECT * FROM chatuser WHERE fullname='$fullname' ");
                        if($queryCheckChat->num_rows > 0){
                            $_SESSION['active_chat'] = $user_id;
                            echo "<p style='color:green;'>Redirecting you to text page in 1 seconds...</p>";
                                echo "<meta http-equiv='Refresh' content='1; url=index.php'>";
                        }else{
                            $queryInsertChat = $con->query("INSERT INTO chatuser(user_id, fullname, phone, email) VALUES('".$user_id."','".$fullname."','".$phone."','".$email."')");
                            if($queryInsertChat == true){
                                $_SESSION['active_chat'] = $user_id;

                                                                
                            }
                            
                        }
                    }
                ?>
                <form method="post"><br>
                    <div class="inputDiv">
                        <div><i class="fa fa-user"></i> Fullname:</div>
                        <input type="text" class="form-control" name="username" value="<?php echo $name;?>" readonly required />
                    </div>
                    <div class="inputDiv">
                        <div><i class="fa fa-tags"></i> Reg Number:</div>
                        <input type="tel" class="form-control" name="phone"  value="<?php echo $reg;?>" readonly/>
                    </div>
                    <div class="inputDiv">
                        <div><i class="fa fa-envelope-o"></i> Email:</div>
                        <input type="email" class="form-control" name="email" value="<?php echo $mail;?>" readonly/>
                    </div>
                    <div class="inputDiv">
                        <button class="btn btn-success" type="submit" name="startchat">Start Chat</button>
                    </div>
                </form>
            </div>
        </div>
    <?php
     }
     ?>
</div>