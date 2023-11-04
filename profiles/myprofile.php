<?php
session_start();

if(!$_SESSION['login']) {
    header('Location: /codingclub/login/index.html');
}
$rollno = $_SESSION['rollno'];

include("connect.php");

$sql = "select * from student_details where rollno = '$rollno'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding club -cp</title>
    <link rel="icon" href="/codingclub/assets/images/smsk2.png">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: monospace;
            margin-top: 0px ;
        }
        header {
            color: #fff;
            background-color: #fff;
            text-align: center;
            margin-top: 1px;
            padding: 20px;
        }
        header img{
            width: 90%;
            max-width: 500px;
        }
        .container-center{
            display:flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            text-align: center;
        }

        .container {
            align-items: center;
            background-color: #fff;
            padding: 40px;
            padding-right: 50px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
            margin-bottom: 20px;
    
        }
        .main {
            text-align: center;
            box-shadow: 0px 0px 5px #000;
            background-color: #fff;
            color: darkred;
            padding: 20px;
        }
        .userimg {
            margin: 0;
            width: 100%;
            height: 50%;
            max-height: 600px;
            border-radius: 0% 0% 0% 0%;
        }
        </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main"> Welcome, <?php echo $result['name']; ?></h1><br>
    <div class="container-center">
        <div class="container">
        <h1></h1>
        <img src="<?Php echo $result['image']; ?>" alt="" class="userimg">
        </div>
    </div>
</body>