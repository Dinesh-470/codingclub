<?php

session_start();

include("connect.php");

$name = strtoupper($_POST["username"]);
$password = $_POST["password"];

$sql = "select password from login where rollno = '$name'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_assoc();

if($result != null){
    if($password == $result['password']) {
        $_SESSION['login'] = true;
        header('location: /codingclub');
    }else{
        $err = "passsword wrong";
    }
}else{
    $err = "no user found";
}
?>
<html>
    <head>
        <style>
            body {
                margin:0;
            }
            h1 {
                font-size: 20px;
                text-align: center;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <h1><?php echo $err; ?></h1>
        <a href="/codingclub/login/"><h1>Back</h1></a>
    </body>
</html>