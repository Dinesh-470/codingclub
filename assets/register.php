<?php 
include('connect.php');

$rollno = $_POST['rollno'];
$name1 = $_POST['firstname'];
$name2 = $_POST['lastname'];
$name = $name2.' '.$name1;

$email = $_POST['email'];
$number = $_POST['number'];

$year = $_POST['year'];
$branch = $_POST['branch'];

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$img_name = $_FILES["image"]["name"];
$temp_name = $_FILES['image']['tmp_name'];

$designation = 'member';

$img_exc = pathinfo($img_name,PATHINFO_EXTENSION);
$img_exc_lc = strtolower($img_exc);
$allowed_exc = array("jpg","jpeg","png");

if($password1 != $password2){
    header("location: /codingclub/registration/passwordwrong.html");
    die("password didnt match");
}else{
    $password_hashed = password_hash($password1,PASSWORD_DEFAULT);
}

if ($_FILES['image']['error'] === 0) {
    if(in_array($img_exc_lc,$allowed_exc)) {
        $new_img_name = $rollno.'.'.$img_exc_lc;
        $image_upload_loc = 'student_images/'.$new_img_name;
        $img_path = '/codingclub/assets/'.$image_upload_loc;
        if(move_uploaded_file($temp_name,$image_upload_loc)) {
            $insert = "INSERT INTO honeypot(id,rollno,name,email,number,year,branch,image,designation,password)
                       VALUES(NULL,'$rollno','$name','$email','$number',$year,'$branch','$img_path','$designation','$password_hashed')";
            if(mysqli_query($conn,$insert)) {
               header("location: /codingclub/registration/success.html");
            }else{
                $err = "connection error";
            }
        }else{
            $err = "error";
        }
    }else{
    $err = "cannot upload this  type of file";
    }
}else{
    $err = "unknown error occured";
}
/*
echo $name;
echo "<br>";
echo $rollno."<br>";
echo $email."<br>".$number;
echo "<br>";
echo $year.$branch."<br>";
echo $password1.$password2."<br>";
echo $img_name.$temp_name."<br>";
*/

echo $err;
?>