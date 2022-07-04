<!-- ====================================html code==================================== -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/icon.js"></script>
    <link rel="stylesheet" href="./STYLEC/co.css">
    <link rel="stylesheet" href="./STYLEC/Regisstyle.css">
    <script>
        $(document).ready(function() {
            $('#menu').click(function() {
                $("#ddl1").show();
            });
            $('#close').click(function() {
                $("#ddl1").hide(500);
            });
            //password matching and checking the strength of the password
            $('#pass').keyup(function() {
                var take = document.getElementById("pass").value;
                var str = take.length;
                if (str == 0) {
                    document.getElementById("msg1").innerHTML = '';
                } else if (str >= 1 && str < 6) {
                    document.getElementById("msg1").innerHTML = '<span style="color:red;font-weight:bloder; font-family:monospace;">WEEK</span>';
                } else if (str >= 6 && str < 8) {
                    document.getElementById("msg1").innerHTML = '<span style="color:blue;font-weight:bloder; font-family:monospace;">NORMAL</span>';
                } else if (str >= 8) {
                    document.getElementById("msg1").innerHTML = '<span style="color:green;font-weight:bloder; font-family:monospace;">Strong</span>';
                }
            });

            $('#cpass').keyup(function() {
                var val1 = document.getElementById("pass").value;
                var val2 = document.getElementById("cpass").value;
                if (val1 == val2) {
                    document.getElementById("msg1").innerHTML = '<span style="color:green;font-weight:bloder; font-family:monospace;">PASSWORD MATCHED</span>';
                } else {
                    document.getElementById("msg1").innerHTML = '<span style="color:red;font-weight:bloder; font-family:monospace;">CONFIRM PASSWORD DID NOT MATCHED THE PASSWORD</span>';
                }
            });
        });
    </script>
</head>

<body onload="generate()">
<header>
        <div class="menu_tray" id="menu_tray">
            <div class="menu_tray_inner1">
                <button style="margin-left:30px;" class="menu_tray_btn">
                    <i class="fa fa-home" onclick="window.location.replace('Login.php')"></i>
                </button>
            </div>
        </div>
    </header>
    <main>
        <form method="POST" action="insertData.php" autocomplete="off" enctype="multipart/form-data">
            <fieldset>
                <legend>New User</legend>
                <table>
                    <tr>
                        <td colspan="2">
                            <div id="lab2">
                                <label id="lab">Details</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="image">User Photo</label>
                            <input type="file" name="file" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="userid">User id</label>
                            <input type="text" name="userid" id="value2" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=" password">Password</label>
                            <input type="password" name="password" placeholder="Password" id="pass" required>
                        </td>
                        <td>
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="cpassword" placeholder="Retype Password" id="cpass" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span id="msg1"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="userid">Aadhaar Number</label>
                            <input type="text" name="aadhaarnumber" placeholder="Aadhaar Number" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="ID_proof_name">
                                ID Proof (PAN/Ration/Voter ID/DL)
                            </label>
                            <select name="ID_proof_name" required>
                                <option value="null">--SELECT--</option>
                                <option value="PAN Card">PAN Card</option>
                                <option value="Ration Card">Ration Card</option>
                                <option value="Voter Id">Voter Id</option>
                                <option value="DL">DL</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">
                        <label for="IDproof">ID Proof
                            <h5>(Details of ID Proof Selected)</h5>
                        </label>
                        <input type="text" name="IDproof" id="idproof" required>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" placeholder="Designation" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="works_under">
                                Works Under
                                <h5>(Government/Private Organization)</h5>
                            </label>
                            <select name="works_under">
                                <option value="null">--select--</option>
                                <option value="government">Government</option>
                                <option value="private">Private</option>
                            </select>
                        </td>
                        <td>
                            <label for="name_organization">
                                Organization Name
                                <h5>(Your Organization if any)</h5>
                            </label>
                            <input type="text" name="name_organization" placeholder="Organization Name">
                        </td>
                    </tr>            
                    <tr>
                        <td colspan="2">
                            <div id="lab2">
                                <label id="lab">Personal Details</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="username">Applicant Name</label>
                            <input type="text" name="username" placeholder="Applicant Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob ">Date of Birth</label>
                            <input type="date" name="dob" placeholder="Applicant Name" required>
                        </td>
                        <td>
                            <label for="age ">Age</label>
                            <input type="number" name="age" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="gender">Gender</label>
                            <select name="gender">
                                <option value="null">--SELECT--</option>
                                <option value="male">MALE</option>
                                <option value="female">FEMALE</option>
                                <option value="others">other</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <div id="lab2">
                                <label id="lab">Address For Communication</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="state">State</label>
                            <select name="state" required>
                                <option value="null">--SELECT--</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                            </select>
                        </td>
                        <td>
                            <label for="city">City</label>
                            <select name="city" required>
                                <option value="null">--SELECT--</option>
                                <option value="lucknow">lucknow</option>
                                <option value="Kanpur">Kanpur</option>
                                <option value="banda">banda</option>
                                <option value="agra">agra</option>
                                <option value="ghaziabad">ghaziabad</option>
                                <option value="jhansi">jhansi</option>
                                <option value="noida">noida</option>
                                <option value="gorakhpur">gorakhpur</option>
                                <option value="bareilly">bareilly</option>
                                <option value="meerut">meerut</option>
                                <option value="varanasi">varanasi</option>
                                <option value="aligarh">aligarh</option>
                                <option value="allahabha">allahabad</option>
                                <option value="sharanpur">sharanpur</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="housenumber">House No.</label>
                            <input type="text" name="housenumber" placeholder="House No." required>
                        </td>
                        <td>
                            <label for="pincode ">Pin Code</label>
                            <input type="number" name="pincode" placeholder="pincode" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="lab2">
                                <label id="lab">Contact Details</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" placeholder="XXXXXXXXXX" required>
                        </td>
                        <td>
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="lab">
                                <label id="lab">BANK DETAILS</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2 ">
                            <label for="acctno">Account Number</label>
                            <input type="text" name="accn" placeholder="Accout Number" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="isfccode ">ISFC Code</label>
                            <input type="text" name="isfccode" placeholder="ISFC Code" required>
                        </td>
                        <td>
                            <label for="upiid">UPI ID</label>
                            <input type="text" name="upi" placeholder="yourupiid@xxx">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn" type="button" name="button" value="Back to Login">
                        </td>
                        <td colspan="2">
                            <input class="btn" type="submit" name="submit" value="submit">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </main>
    <footer>
    </footer>
    <script>
        function generate() {

            var uppercase = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var number = "0122456789";
            var uid = "";
            var uid1 = "";
            var uid2 = "";

            //LOOP FOR ALPHABATES
            for (var i = 0; i <= 5; i++) {
                var randomNumber = Math.floor(Math.random() * uppercase.length);
                uid += uppercase.substring(randomNumber, randomNumber + 1);
            }

            

            //LOOP FOR NUMBERS
            for (var i = 0; i <= 5; i++) {
                var randomNumber = Math.floor(Math.random() * number.length);
                uid2 += number.substring(randomNumber, randomNumber + 1);
            }
            var p = uid1 + uid + uid2;
            document.getElementById("value2").value = p;
        }
    </script>
</body>

</html>