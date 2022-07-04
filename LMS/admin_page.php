<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location:Error.php');
} else {
    $iduser= $_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="10"> -->
    <script src="./js/icon.js"></script>
    <script src="./js/jlib.js"></script>
    <link rel="stylesheet" href="./STYLEC/co.css">
    <link rel="stylesheet" href="./STYLEC/ADMIN_PAGECSS.css">
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
    <title>ADMIN PANNEL</title>
</head>

<body>
    <header>
        <div class="menu_tray" id="menu_tray">
            <div class="menu_tray_inner1">
                <button style="margin-left:30px;" class="menu_tray_btn">
                    <i class="fa fa-home"></i>
                </button>
                <a href="view.php?id=<?php echo $iduser ?>">
                    <button class="menu_tray_btn">
                        <i class="fa fa-user"></i>                    
                    </button>
                </a>
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
        <center><h1>ONLINE LABOUR MANAGMENT SYSTEM</h1></center>
        <div class="adminpannel_base" >
            <div class="inner_adminpannel">
                <button class="adminpannel_btn" onclick="window.location.replace('new_applicant_approval_page.php');">Licence Validation List</button>
            </div>
            <div class="inner_adminpannel">
                <button class="adminpannel_btn" onclick="window.location.replace('registration.php');">New Registration</button>
            </div>
        </div>
        <hr>
        <div class="list">
            <div class="sreach_base">
                <input placeholder="Sreach By UserID" type="text" name="sreach" id="myinput">
            </div>
            <div class="alluserlist_basediv">
                <table id="myTable">
                    <thread>
                        <thead>
                            <th><div class="heading">Serial No.</div></th>
                            <th><div class="heading">Photo</div></th>
                            <th><div class="heading">Registration Number</div></th>
                            <th><div class="heading">User ID</div></th>
                            <th><div class="heading">Licence Number</div></th>
                            <th><div class="heading">Action</div></th>
                        </thead>
                            <?php
                            include 'DataBase_Connection.php';
                                $sql = "SELECT * FROM verification_table";
                                $query = mysqli_query($con,$sql);
                                $num = mysqli_num_rows($query);
                                $sn = 0;
                                if($num>0){
                                while($res = mysqli_fetch_array($query))
                                {
                                    
                                    $t = $res['userid'];
                                    $sn++;
                                        $img = '';
                                        if($res['userimage']===NULL){
                                            $img = './userimg/default.jpg';
                                        }else{
                                            $img = $res['userimage'];
                                        }
                            ?>
                            
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="table_content">
                                            <?php echo $sn; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table_content">
                                            <div class="img">
                                                <img src="<?php echo $img; ?>" height="100%" width="100%">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table_content">
                                            <?php echo $res['registrationnumber']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table_content">
                                            <?php echo $res['userid']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table_content">
                                            <?php echo $res['licence_number']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table_content">
                                            <a href="adminwilledituser_profile.php?uid=<?php echo $t; ?>">
                                                <button>
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> 
                                        </div>
                                    </td>
                                </tr>
                            </tbody>     
                            <?php
                            }
                        }
                            ?>   
                    </thread>
                </table>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>