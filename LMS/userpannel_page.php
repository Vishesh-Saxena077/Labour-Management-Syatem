<?php
session_start();
include 'DataBase_Connection.php';
if (!isset($_SESSION['userid'])) {
    header('location:Error.php');
} else {
    $iduser= $_SESSION['userid'];
}

    $sql = "SELECT * FROM verification_table";
    $query = mysqli_query($con,$sql);
    $res = mysqli_fetch_array($query);
    $sql1 = "SELECT * FROM personal_details";
    $query1 = mysqli_query($con,$sql1);
    $res1 = mysqli_fetch_array($query1);

    if($res['userimage']===NULL){
                                            $img = './userimg/default.jpg';
                                        }else{
                                            $img = $res['userimage'];
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
    <link rel="stylesheet" href="./STYLEC/User_Pannel.css">
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
            $("#myinput").keyup(function(){
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myinput");
                filter = input.value;
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) 
                {
                    td = tr[i].getElementsByTagName("td")[3];
                    if (td) 
                    {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            });
        });
    </script>
    <title>User Pannel</title>
</head>
<body>
    <header>
        <div class="menu_tray" id="menu_tray">
            <h1 style="float:left">ONLINE LMS PORTAL</h1>
            <div class="menu_tray_inner1">
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
        <div>
    </div>
        <div class="profilebase">
            <table>
                <tr>
                    <td><div class="photo">
                        <img src="<?php echo $img; ?>" height="100%" width="100%">
                    </div></td>
                    <td><?php echo "NAME : ".$res1['username']."<br>"."GENDER : ".$res1['gender']."<br><br>".$res['licence_number']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="naming"><?php echo $res['userid']; ?></div>
                    </td>
                </tr>
                <tr>
                    <td>licenceissueddate:<?php echo $res['licenceissueddate']; ?></td>
                    <td>licencevalidupto:<?php echo $res['licencevalidupto']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="download_btn" onclick="print()">Download</button>
                    </td>
                </tr>
            </table>
    </div>
    <div>
        <a href="userprofileedit.php?uid=<?php echo $iduser; ?>" class="viewanc"><h1>VIEW</h1></a><br>
    </div>
        
    </main>
    <footer></footer>
</body>
</html>