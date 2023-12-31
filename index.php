<?php
session_start();

if(!$_SESSION['login']) {
    header('Location: /codingclub/login/index.html');
}

include("assets/connect.php");

$rollno = $_SESSION['rollno'];

$sql = "select * from student_details where rollno = '$rollno'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codingclub</title>
    <link rel="icon" href="/codingclub/assets/images/smsk2.png" type="images/png">
    <style>
        body {
            /*background-image:linear-gradient(to right,#c2e59c,#64b3f4);*/
            background-color: #fffdf7;
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
        .container {
            align-items: center;
            background-color: #fff;
            padding: 40px;
            padding-right: 50px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
            position:relative;
        }
        .wrapper {
            height: auto;
            overflow: auto;
            position: relative;
            margin-top:0px;
            background-color: #48d4ba;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
        ul {
            display:flex;
            list-style-type: none;
            text-align:right;
            font-size: 15px;
            margin-left: 2px;
        }
        li {
            padding:10px;
            margin-right:20px;
            margin-left: 0px;
            box-shadow: 5px 10px 10px #000;
            background-color: #fff;
            color: #000;
            border-radius: 20%;
            transition: padding 0.3s ease-in-out;
        }
        li:hover {
            padding: 20px;
        }
        a {
            text-decoration:none;
            color: #000;
        }
        .main {
            text-align: center;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            background-color: #fff;
            color: darkred;
            padding: 20px;
        }
        .fotter {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 99%;
            height: 60px; 
            background-color: #262626;
            border: 2px solid #000;
            border-radius: 50% 50% 0% 0%;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .img_container {
            width: 100%;
            height: 100%;
            z-index: 1; 
        }
        .circled {
            width: 45px;
            height: 45px;
            border:2px solid #000;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 5px 5px 10px #000;
        }
        .user_img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 50%;
            bottom: 0px;
            width: auto;
            height: auto;
        }
        img {
            width: 90%;
            height: 50%;
        }
    </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main"> Welcome. <?php echo $result['name'] ?></h1><br>
    <div class="wrapper">
        <ul>
            <a href="/codingclub/"><li>Home</li></a><br>
            <a href="/codingclub/events"><li>Events</li></a><br>
            <a href="/codingclub/tests"><li>Tests</li></a><br>
            <a href="/codingclub/profiles"><li>Profiles</li></a><br>
            <a href="/codingclub/about.php"><li>About</li></a><br>
            
            <a href="/codingclub/cp"><li>Admin(cp)</li></a><br>
        </ul>
    </div>
    <div class="container">
        <h1>something.. great is about to happen.. </h1>
        <h2>loading......</h2>
        <img src="https://cdn.pixabay.com/photo/2017/10/26/17/51/under-construction-2891888_1280.jpg">
    </div>

    <div class="fotter">
    <div class="img_conainer">
        <a href="profiles/myprofile.php">
        <div class="circled">
            <div class="user_img">
                <img src="<?php echo $result['image']; ?>">
            </div>
        </div>
        </a>
    </div>
    </div>
</body>
</html>