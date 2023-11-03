<?php

session_start();

include("connect.php");

$name = strtoupper($_POST["username"]);
$password = $_POST["password"];

$sql = "select * from control where rollno = '$name'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_assoc();

if($result != null){
    if($password == $result['password']) {
        $_SESSION['admin_login'] = true;
        $_SESSION['year'] = $result['year'];
        $_SESSION['branch'] = $result['branch'];
        $_SESSION['designation'] = $result['designation'];
        $_SESSION['admin_name'] = $result['name'];

        header('location: /codingclub/cp/dashboard.php');
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
        <a href="/codingclub/cp/"><h1>Back</h1></a>
    </body>
</html>