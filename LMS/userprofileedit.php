<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location:Error.php');
} 
//=============================================================Table One verification table
$id = $_GET['uid'];

$sql1 = "SELECT * FROM verification_table WHERE userid='$id'";
$sql2 = "SELECT * FROM personal_details WHERE userid='$id'";
$sql3 = "SELECT * FROM salary_table WHERE userid='$id'";
$sql4 = "SELECT * FROM bank_details_table WHERE userid='$id'";

$showdata1 = mysqli_query($con,$sql1);
$showdata2 = mysqli_query($con,$sql2);
$showdata3 = mysqli_query($con,$sql3);
$showdata4 = mysqli_query($con,$sql4);

$arrdata1 = mysqli_fetch_array($showdata1);
$arrdata2 = mysqli_fetch_array($showdata2);
$arrdata3 = mysqli_fetch_array($showdata3);
$arrdata4 = mysqli_fetch_array($showdata4);

$registrationnumber = $arrdata1['registrationnumber'];
$userid = $arrdata1['userid'];
$userimage = $arrdata1['userimage'];
$img='';
if($userimage===NULL){
    $img = './userimg/default.jpg';
}else{
    $img = $userid;
}
$applicationnumber = $arrdata1['applicationnumber'];
$registrationfee = $arrdata1['registrationfee'];
$applicationstatus = $arrdata1['applicationstatus'];
$applicationdate = $arrdata1['applicationdate'];
$aadhaarnumber = $arrdata1['aadhaarnumber'];
$ID_proof_name = $arrdata1['ID_proof_name'];
$ID_proof = $arrdata1['ID_proof'];
$licence_number = $arrdata1['licence_number'];

$licenceissueddate = $arrdata1['licenceissueddate'];
if($licenceissueddate===NULL){
    $lid = date("Y-m-d");
}else{
    $lid = $licenceissueddate;
}
$stamppingplace = $arrdata1['stamppingplace'];
$licenceissueddate = $arrdata1['licenceissueddate'];
$licencevalidupto = $arrdata1['licencevalidupto'];
$works_under = $arrdata1['works_under'];
$name_organization = $arrdata1['name_organization'];


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

$salary = $arrdata3['salary'];
$salarystatus = $arrdata3['salarystatus'];
$salarydate = $arrdata3['salarydate'];

$accountnumber = $arrdata4['accountnumber'];
$isfccode = $arrdata4['isfccode'];
$upiid = $arrdata4['upiid'];

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
    <link rel="stylesheet" href="./STYLE/co.css">
    <link rel="stylesheet" href="./STYLE/userdataedit.css">
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
</head>

<body>
<header>
        <div class="menu_tray" id="menu_tray">
            <div class="menu_tray_inner1">
                <button style="margin-left:30px;" class="menu_tray_btn">
                    <i class="fa fa-home" onclick="window.location.replace('userpannel_page.php');"></i>
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
        <form method="POST" action="edtingprofile.php" autocomplete="off">
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
                            <label for="registrationnumber">Registration Number</label>
                            <input type="text" name="registrationnumber" value="<?php echo $registrationnumber;?>" placeholder="Registration Number" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="registrationfee">Registration Fee</label>
                            <input type="text" name="registrationfee" value="<?php echo $registrationfee; ?>" placeholder="Registration fee" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="licence">licence number</label>
                            <input type="text" name="licence_number" value="<?php echo $licence_number;?>" placeholder="licence number" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="licenceissueddate">Licence Issue Date</label>
                            <input type="date" name="licenceissueddate" value="<?php echo $licenceissueddate;?>" placeholder="Licence Issue Date" readonly>
                        </td>
                        <td>
                            <label for="licencevalidupto">Licence Valid Up To</label>
                            <input type="date" name="licencevalidupto" id="value4" value="<?php echo $licencevalidupto; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="stampingplace">Stamping Place</label>
                            <input type="text" name="stamppingplace" value="<?php echo $stamppingplace; ?>" placeholder="Stamping palce" readonly>
                        </td>
                        <td>
                            <label for="Applicationdate">Application Date</label>
                            <input type="date" name="applicationdate" value="<?php echo $applicationdate; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="applicationnumber">Application Number</label>
                            <input type="text" name="applicationnumber" value="<?php echo $applicationnumber; ?>" readonly>
                        </td>
                        <td>
                            <label for="applicationstatus">Application Status</label>
                            <input type="text" name="applicationstatus" value="<?php echo $applicationstatus; ?>" readonly>
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
                            <label for="aaadhaarnumber">Aadhaar Number</label>
                            <input type="text" name="aadhaarnumber" placeholder="Aadhaar Number" value="<?php echo $aadhaarnumber; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="ID_proof_name">
                                ID Proof (PAN/Ration/Voter ID/DL)
                            </label>
                            <input type="text" name="ID_proof_name" placeholder="ID PROOF NAME" value="<?php echo $ID_proof_name;?>">
                        </td>
                    </tr>
                    <td colspan="2">
                        <label for="ID_proof">ID Proof
                            <h5>(Detail of ID Proof Selected)</h5>
                        </label>
                        <input type="text" name="ID_proof" placeholder="ID Proof" value="<?php echo $ID_proof; ?>">
                    </td>
                    <tr>
                        <td>
                            <label for="works_under">
                                Works Under
                                <h5>(Government/Private Organization)</h5>
                            </label>
                            <input type="text" name="works_under" placeholder="Works Under" value="<?php echo $works_under; ?>">
                        </td>
                        <td>
                            <label for="name_organization">
                                Organization Name
                                <h5>(Your Organization if any)</h5>
                            </label>
                            <input type="text" name="name_organization" placeholder="Organization Name" value="<?php echo $name_organization; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" placeholder="Designation" value="<?php echo $designation; ?>">
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
                            <input type="text" name="username" placeholder="Applicant Name" value="<?php echo $username;?>">
                        </td>
                        <td>
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" value="<?php echo $dob;?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" palceholder="gender" value="<?php echo $gender; ?>">
                        </td>
                    </tr>
                    <!-- ============================================================================================  -->
                    <!-- ============================================================================================  -->
                    <!-- ============================================================================================  -->
                    <!-- ============================================================================================  -->
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
                            <input type="text" name="s_tate" placeholder="state" value="<?php echo $s_tate;?>">
                        </td>
                        <td>
                            <label for="disrtict">City</label>
                            <input  type="text" name="district" placeholder="city" value="<?php echo $district; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="housenumber">House No.</label>
                            <input type="text" name="housenumber" placeholder="House No." value="<?php echo $housenumber; ?>">
                        </td>
                        <td>
                            <label for="pincode">Pin Code</label>
                            <input type="text" name="pincode" placeholder="pincode" value="<?php echo $pincode; ?>">
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
                            <input type="text" name="phonenumber" placeholder="XXXXXXXXXX" value="<?php echo $phonenumber; ?>">
                        </td>
                        <td>
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="lab">
                                <label id="lab">BANK DETAILS</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2 ">
                            <label for="accountnumber">Account Number</label>
                            <input type="text" name="accountnnumber" placeholder="Account Number" value="<?php echo $accountnumber; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="isfccode ">ISFC Code</label>
                            <input type="text" name="isfccode" placeholder="ISFC Code" value="<?php echo $isfccode; ?>">
                        </td>
                        <td>
                            <label for="upiid">UPI ID</label>
                            <input type="text" name="upiid" placeholder="yourupiid@xxx" value="<?php echo $upiid; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" placeholder="Salary" value="<?php echo $salary; ?>" readonly>
                        </td>
                        <td>
                            <label for="salarystatus">Salary Status</label>
                            <input type="text" name="salarystatus" placeholder="Salary Status" value="<?php echo $salarystatus; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="salarydate">Salary Date</label>
                            <input type="date" name="salarydate" value="<?php echo $salarydate; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn" type="submit" name="submit" value="submit">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </main>
    <hr>
    <footer>
        sds
    </footer>
    
</body>

</html>

