<?php
session_start();

        include 'DataBase_Connection.php';

        if (isset($_POST['submit'])) 
        {
            $userid = $_POST['userid'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $username = $_POST['username'];
            $designation = $_POST['designation'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $aadhaarnumber = $_POST['aadhaarnumber'];
            $ID_proof_name = $_POST['ID_proof_name'];
            $ID_proof = $_POST['IDproof'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $s_tate = $_POST['state'];
            $city = $_POST['city'];
            $housenumber = $_POST['housenumber'];
            $pincode = $_POST['pincode'];
            $work_under = $_POST['works_under'];
            $name_organization = $_POST['name_organization'];
            $applicationdate = date('Y-m-d');
            $accn = $_POST['accn'];
            $isfccode = $_POST['isfccode'];
            $upi = $_POST['upi'];

//===================================================================================================
//===================================================================================================
        //DECLARING PHOTO OF THE USER
            $files = $_FILES['file']; 
            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetemp = $files['tmp_name'];
            $filetxt = explode('.',$filename);
            $filecheck = strtolower(end($filetxt));
            $fileextentions = array('png','jpg','jpeg');
//===================================================================================================
//===================================================================================================



//===================================================================================================
//===================================================================================================
            //GENRATING APPLICATION NUMBER
            $comb = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $combLen = strlen($comb) - 1;
            for ($i = 0;
                $i < 8;
                $i++
            ) {
                $n = rand(0, $combLen);
                $pass[] = $comb[$n];
            }
            $a = rand(10000, 1000000);
            $b = rand(1000, 10000);
            $applicationnumber = "UP/93/". implode($pass). "/".$a . "/" . $b;
//===================================================================================================
//===================================================================================================





//===================================================================================================
//===================================================================================================
            //HASHING PASSWORD
            $passhash = password_hash($password, PASSWORD_BCRYPT);
            $cpasshash = password_hash($cpassword, PASSWORD_BCRYPT);
//===================================================================================================
//===================================================================================================
            if(in_array($filecheck,$fileextentions))
            {
                $detinationfile = 'userimg/'.$filename;

                move_uploaded_file($filetemp,$detinationfile);
                if ($password === $cpassword) 
                {
                    $sql1 = "INSERT INTO personal_details(userid,username,designation,dob,gender,phonenumber,email,s_tate, district,housenumber,pincode) VALUES ('$userid','$username','$designation','$dob','$gender','$phonenumber','$email','$s_tate','$city','$housenumber','$pincode')";

                    $sql2 = "INSERT INTO login_table(userid,pass,cpass) VALUES ('$userid','$passhash','$cpasshash')";
                    
                    $sql3 = "INSERT INTO bank_details_table(userid,accountnumber,isfccode,upiid) VALUES ('$userid','$accn','$isfccode','$upi')";

                    $sql4 = "INSERT INTO salary_table(userid) VALUES ('$userid')";
                    
                    $sql5 = "INSERT INTO attendance(userid) VALUES ('$userid')";

                    $sql5 = "INSERT INTO verification_table(userid,userimage,applicationnumber,applicationdate,aadhaarnumber,ID_proof_name,ID_proof,works_under,name_organization) VALUES ('$userid','$detinationfile','$applicationnumber','$applicationdate','$aadhaarnumber','$ID_proof_name','$ID_proof','$work_under','$name_organization')";

                    $sql6 = "INSERT INTO attendance(userid) VALUES ('$userid')";

                    if($sql1 && $sql2 && $sql3 && $sql4 && $sql5 )
                    {
                            $res1 = mysqli_query($con, $sql1);
                            $res2 = mysqli_query($con, $sql2);
                            $res3 = mysqli_query($con, $sql3);
                            $res4 = mysqli_query($con, $sql4);
                            $res5 = mysqli_query($con, $sql5);
                            $res6 = mysqli_query($con, $sql6);

                        if ($res1 && $res2 && $res3 && $res4 && $res5 && $res6) 
                        {
                            echo "Data Inserted Sucessfully";
                        }
                        else
                        {
                            die ('ERROR OCCOURED,mysqli_error()');
                        }
                    }
                    else 
                    {
                        die("CODING PROBLEM WORNG QUERRY RUNS");
                    }
                } 
                else 
                {
                    echo "password did not matched";
                }
            }
            else
            {
                echo 'file did not matched the given format';
            }
        } 
        else 
        {
           echo "no data is submitted form the form";
        }
        ?>