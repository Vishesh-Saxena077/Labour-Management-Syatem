<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/icon.js"></script>
    <script src="./js/jlib.js"></script>
    <link rel="stylesheet" href="./STYLEC/co.css">
    <link rel="stylesheet" href="./STYLEC/loginstyle.css">
    <title>LMS login page</title>
</head>

<body>
    <?php
session_start();
include 'DataBase_Connection.php';

    if (isset($_POST['submit'])) {
        $userid = $_POST['uid'];
        $password = $_POST['userpass'];

        $sql = "SELECT * FROM login_table WHERE userid = '$userid'";

        $checkquery = mysqli_query($con, $sql);
        $id_count = mysqli_num_rows($checkquery);

        if ($id_count) 
        {
            $res = mysqli_fetch_assoc($checkquery);
            $user_pass = $res['pass'];
            $user_id = $res['userid'];

            if($user_id==="ADMIN#123" && $user_pass="toto@123"){
                $_SESSION['userid'] = $userid;
                ?>
                <script>
                    $(document).ready(function(){
                        $('form').hide();
                        $('#msg').show();
                        setTimeout(function(){window.location.replace("admin_page.php")},5000);
                    });
                </script>
                <?php
            }
            else
            {
                $password_decode = password_verify($password, $user_pass);
                if ($password_decode) {
                $_SESSION['userid'] = $userid;
    ?>

                <script>
                    $(document).ready(function(){
                        $('form').hide();
                        $('#msg').show();
                        setTimeout(function(){window.location.replace("userpannel_page.php")},5000);
                    });
                </script>

    <?php
                } else {
                    echo "PASSWORD DID NOT MATCHED";
                }   
            }
        } else {
            echo "id not found";
        }
    }
    ?>
    <header>
                <a href="Guide.php">Help and Guide for LMS</a>
    </header>
    <main>
        <h1>ONLINE LMS PORTAL</h1>
        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <fieldset id="form">
                <legend>login</legend>
                <table>
                    <tr>
                        <td>
                            <input type="text" name="uid" placeholder="UserID" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="password" name="userpass" placeholder="Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit" value="submit" class="login_btn">login</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="forgotpassword.php" style="float:left">forgot password</a>
                            <a href="registration.php" style="float:right">Register</a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <div id="msg">PROSESSING . . . . .</div>
    </main>
    <footer>
        <p>
            <h4>for any Help<br>CONTACT Us: +91 7355288989</h4>
        </p>
    </footer>
</body>

</html>