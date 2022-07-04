<?php
session_start();
include 'DataBase_connection.php';

if(isset($_POST['submit']))
{
    $registrationnumber = $_POST['registrationnumber'];
    $userid = $_POST['userid'];
    $applicationnumber = $_POST['applicationnumber'];
    $registrationfee = $_POST['registrationfee'];
    $applicationstatus = $_POST['applicationstatus'];
    $applicationdate = $_POST['applicationdate'];
    $aadhaarnumber = $_POST['aadhaarnumber'];
    $ID_proof_name = $_POST['ID_proof_name'];
    $ID_proof = $_POST['ID_proof'];
    $licence_number = $_POST['licence_number'];
    $licenceissueddate = $_POST['licenceissueddate'];
    $stamppingplace = $_POST['stamppingplace'];
    $licencevalidupto = $_POST['licencevalidupto'];
    $works_under = $_POST['works_under'];
    $name_organization = $_POST['name_organization'];

    $username=$_POST['username'];
    $designation=$_POST['designation'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $phonenumber=$_POST['phonenumber'];
    $email=$_POST['email'];
    $s_tate=$_POST['s_tate'];
    $district=$_POST['district'];
    $housenumber=$_POST['housenumber'];
    $pincode=$_POST['pincode'];

    $salary = $_POST['salary'];
    $salarystatus = $_POST['salarystatus'];
    $salarydate = $_POST['salarydate'];

    $accountnnumber = $_POST['accountnnumber'];
    $isfccode = $_POST['isfccode'];
    $upiid = $_POST['upiid'];


    $sql1 = "UPDATE personal_details SET registrationnumber='$registrationnumber',userid='$userid',username='$username',designation='$designation',dob='$dob',gender='$gender',phonenumber='$phonenumber',email='$email',s_tate='$s_tate',district='$district',housenumber='$housenumber',pincode='$pincode' WHERE userid = '$userid' ";

    $sql2 = "UPDATE verification_table SET registrationnumber='$registrationnumber',userid='$userid',applicationnumber='$applicationnumber',registrationfee='$registrationfee',applicationstatus='$applicationstatus',applicationdate='$applicationdate',aadhaarnumber='$aadhaarnumber',ID_proof_name='$ID_proof_name',ID_proof='$ID_proof',licence_number='$licence_number',licenceissueddate='$licenceissueddate',licencevalidupto='$licencevalidupto',stamppingplace='$stamppingplace',works_under='$works_under',name_organization='$name_organization' WHERE userid = '$userid' ";
    
    $sql3 = "UPDATE salary_table SET registrationnumber='$registrationnumber', userid='$userid', salary='$salary',salarystatus='$salarystatus', salarydate='$salarydate' WHERE userid ='$userid' ";
    
    $sql4 = "UPDATE bank_details_table SET registrationnumber='$registrationnumber',userid='$userid',accountnumber='$accountnnumber',isfccode='$isfccode',upiid='$upiid' WHERE userid='$userid' ";

    $sql5= "UPDATE login_table SET registrationnumber='$registrationnumber' WHERE userid='$userid' ";

    $sql6= "UPDATE attendance SET registrationnumber='$registrationnumber' WHERE userid='$userid' ";

    $res1 = mysqli_query($con,$sql1);
    $res2 = mysqli_query($con,$sql2);
    $res3 = mysqli_query($con,$sql3);
    $res4 = mysqli_query($con,$sql4);
    $res5 = mysqli_query($con,$sql5);
    $res6 = mysqli_query($con,$sql6);

    if($res1 && $res2 && $res3 && $res4 && $res5)
    {
        echo "Updated";
        header('location:admin_page.php');
    }
    else
    {
        echo "ERROR";
    }
}else{
    echo"not set";
}
?>