
<?php
include("connect.php");  // to established connection

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];    // to take photo from db
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];




if($password==$cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");  // to store the image in folder
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$address', '$password', '$image', '$role', 0, 0)");
    if($insert){
        echo '
        <script>
           alert("Registration Successfull !");
            window.location = "../";
        </script>
    ';
    }
    else{
        echo '
        <script>
           alert("Some error occured !");
            window.location = "../routes/register.html";
        </script>
    ';

    }


}
else{
    echo '
        <script>
           alert("Password and Confirm password does not match !");
            window.location = "../routes/register.html";
        </script>
    ';
    
}

?>