<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location:Error.php');
} else {
    $iduser= $_SESSION['userid'];
}
//=============================================================Table One verification table
$id = $_GET['id'];

$sql2 = "SELECT * FROM personal_details WHERE userid='$iduser'";

$showdata2 = mysqli_query($con,$sql2);
$num = mysqli_num_rows($showdata2);
if($num){
    $arrdata2 = mysqli_fetch_assoc($showdata2);
    $userid = $arrdata2['userid'];
    $username=$arrdata2['username'];
    $designation=$arrdata2['designation'];
    $dob=$arrdata2['dob'];
    $Age=$arrdata2['age'];
    $gender=$arrdata2['gender'];
    $phonenumber=$arrdata2['phonenumber'];
    $email=$arrdata2['email'];
    $s_tate=$arrdata2['s_tate'];
    $district=$arrdata2['district'];
    $housenumber=$arrdata2['housenumber'];
    $pincode=$arrdata2['pincode'];
}else{
    echo"id not found";
}
?>
<!-- ====================================html code==================================== -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user View and edit Page</title>
    <script src="./js/icon.js"></script>
    <script src="./js/jlib.js"></script>
    <link rel="stylesheet" href="./STYLEC/co.css">
    <link rel="stylesheet" href="./STYLEC/userdataedit.css">
    <script>
        $(document).ready(function() 
        {
            $('#logout_div').hide();
            $('#logout').click(function() {
                $('#logout_div').slideDown();
                $('#menu_tray').hide();
            });
            $('#cancel_btn').click(function() {
                $('#logout_div').hide();
                $('#menu_tray').show();
            });
            $('#logout_btn').click(function() {
                window.location.replace("Logout.php");
            });
            
        });
    </script>
</head>

<body>
<header>
        <div class="menu_tray" id="menu_tray">
            <div class="menu_tray_inner1">
                <button style="margin-left:30px;" class="menu_tray_btn">
                    <i class="fa fa-home" onclick="window.location.replace('admin_page.php');"></i>
                </button>
                <button class="menu_tray_btn">
                    <i class="fa fa-power-off" id="logout"></i>
                </button>
            </div>
        </div>
        
        <div class="logout_div" id="logout_div">
            <div class="dialog_box">
                <div class="inner_dialog_box">
                    <i class="fa fa-window-close" id="cancel_btn"></i>
                    <h3>Are You Sure You Want logut the current Session ?</h3>
                    <form method="POST" action="Logout.php">
                        <button class="logout_btn" name="logout_btn" id="logout_btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
   
    </header>
    <main>
            <fieldset>
                <legend>New User</legend>
                <table>
                    <tr>
                        <td colspan="2">
                            <div class="lab">
                                <label id="lab">Details</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="userid">User id</label>
                            <input type="text" name="userid" value="<?php echo $userid; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" placeholder="Designation" value="<?php echo $designation; ?>" readonly>
                        </td>
                    </tr>
                   <!-- ============================================================================================  -->
                   <!-- ============================================================================================  -->
                   <!-- ============================================================================================  -->
                   <!-- ============================================================================================  -->
                    <tr>
                        <td colspan="2">
                            <div class="lab">
                                <label id="lab">Personal Details</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="username">Applicant Name</label>
                            <input type="text" name="username" placeholder="Applicant Name" value="<?php echo $username;?>" readonly>
                        </td>
                        <td>
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" value="<?php echo $dob;?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" palceholder="gender" value="<?php echo $gender; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="lab">
                                <label id="lab">Address For Communication</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="s_tate">State</label>
                            <input type="text" name="s_tate" placeholder="state" value="<?php echo $s_tate;?>"readonly>
                        </td>
                        <td>
                            <label for="disrtict">City</label>
                            <input  type="text" name="district" placeholder="city" value="<?php echo $district; ?>"readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="housenumber">House No.</label>
                            <input type="text" name="housenumber" placeholder="House No." value="<?php echo $housenumber; ?>"readonly>
                        </td>
                        <td>
                            <label for="pincode">Pin Code</label>
                            <input type="text" name="pincode" placeholder="pincode" value="<?php echo $pincode; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="lab">
                                <label id="lab">Contact Details</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" placeholder="XXXXXXXXXX" value="<?php echo $phonenumber; ?>" readonly>
                        </td>
                        <td>
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="adminwilledituser_profile.php?uid=<?php echo $id; ?>">
                                <input class="btn" type="submit" name="submit" value="submit">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="forgotpassword.php?uid=<?php echo $id; ?>">
                                <input class="btn" type="submit" name="changepass" value="Change password">
                            </a>
                        </td>
                    </tr>
                </table>
            </fieldset>
    </main>
    <hr>
    <footer>
        sds
    </footer>
    
</body>

</html>

