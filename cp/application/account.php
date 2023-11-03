<?php

session_start();

if(!$_SESSION['admin_login']){
    header('location: /codingclub/cp');
    die();
}

if(isset($_GET['text']) && isset($_GET['id'])) {
        $text = $_GET['text'];
        $id = $_GET['id'];
}else{
    header('location: /codingclub/cp/application/application.php');
    die();
}

include("connect.php");

if($text == 'accept') {
    accept($conn,$id);
}
if($text == 'decline') {
    decline($id);
}
function accept($conn,$id) {
    $sql = "select * from honeypot where rollno = '$id'";
    $res = mysqli_query($conn,$sql);
    $result = $res->fetch_assoc();
    //results
    $rollno = $result['rollno'];
    $name = $result['name'];
    $email = $result['email'];
    $number = $result['number'];
    $year = $result['year'];
    $branch = $result['branch'];
    $image = $result['image'];
    $desig = $result['designation'];
    $password = $result['password'];
    
    //joining them

}

function decline($id) {
    $sql = "select * from honeypot where rollno = '$id'";
    $res = mysqli_query($conn,$sql);
    $result = $res->fetch_assoc();
    
    $rollno = $result['rollno'];
    $name = $result['name'];
    $email = $result['email'];
    $number = $result['number'];
    $year = $result['year'];
    $branch = $result['branch'];
    $image = $result['image'];
    $desig = $result['designation'];
    $password = $result['password'];

}

?>