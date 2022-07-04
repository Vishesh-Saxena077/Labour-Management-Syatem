<?php
include 'DataBase_Connection.php';

if(isset($_POST['forgotpassword'])){
    $userid = $_POST['userid'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $passhash = password_hash($pass, PASSWORD_BCRYPT);
    $cpasshash = password_hash($cpass, PASSWORD_BCRYPT);

    if($pass===$cpass)
    {
        $sql = "UPDATE login_table SET pass='$passhash',cpass='$cpasshash' WHERE userid = '$userid'";
        $res = mysqli_query($con,$sql);
        if($res)
        {
            ?>
            <script>
                alert("Password Updated");
                window.location.replace('Login.php');
            </script>
            <?php
        }
        else
        {
            echo "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/icon.js"></script>
    <script src="./js/jlib.js"></script>
    <link rel="stylesheet" href="./STYLEC/co.css">
    <link rel="stylesheet" href="./STYLEC/forgotpassword.css">
    <title>Forgot Password</title>
</head>
<body>
    <header>
        <div class="menu_tray" id="menu_tray">
            <div class="menu_tray_inner1">
                <button style="margin-left:30px;" class="menu_tray_btn">
                    <i class="fa fa-home" onclick="window.location.replace('admin_page.php');"></i>
                </button>
            </div>
        </div>
    </header>
    <main>
        <form method="POST" action="#">
            <div class="base_div">
                <table>
                    <tr>
                        <td>Forgot Password</td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" placeholder="Userid" name="userid"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" placeholder="Password" name="pass"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" placeholder="Confirm Password" name="cpass"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="submit" name="forgotpassword" value="change password"> 
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </main>
</body>
</html>