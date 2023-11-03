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
    decline($conn,$id);
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
    //sql to insert into main table from honeypot
    $insertinto_students = "INSERT INTO student_details(id,rollno, name, email, number, year, branch, image, designation)
                            VALUES(NULL,'$rollno','$name','$email','$number',$year,'$branch','$image','$desig')";
    $insertinto_login = "INSERT INTO login(id,rollno,password)
                            VALUES(NULL,'$rollno','$password')";
    $deletefrom_honeypot = "DELETE from honeypot where rollno = '$rollno'";                                            
    //execute
    mysqli_query($conn, $insertinto_login);
    mysqli_query($conn,$insertinto_students);
    mysqli_query($conn,$deletefrom_honeypot);
    $scrpit = "<script>alert('Application Accepted! User Created Successfully and Honeypot Deleted');</script>";
    echo $scrpit;
    sleep(5);
    header('location: application.php');
}

function decline($conn,$id) {
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
    
    //delete from honeypot
    $deletefrom_honeypot = "DELETE from honeypot where rollno = '$rollno'";
    $insertinto_rejecteddetails = "INSERT INTO rejected_details(id,rollno, name, email, number, year, branch, image)
                                    VALUES(NULL,'$rollno','$name','$email','$number',$year,'$branch','$image')";
    mysqli_query($conn,$insertinto_rejecteddetails);
    mysqli_query($conn,$deletefrom_honeypot);
    header('location: application.php');
}
?>