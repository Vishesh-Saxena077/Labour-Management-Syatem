<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "lms";

//CREATING THE CONNECTION
$con = mysqli_connect($hostname, $username, $password, $database_name);

if ($con) {

} else {
?>
    <script>
        alert("Data Base Connection Done Sucessfully");
    </script>
<?php
}
?>












