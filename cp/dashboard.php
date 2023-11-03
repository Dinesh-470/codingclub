<?php
session_start();

if(!$_SESSION['admin_login']){
    header('location: /codingclub/cp');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding club -register</title>
    <link rel="icon" href="/codingclub/assets/images/smsk2.png">
    <style>
        body {
            /*background-image:linear-gradient(to right,#c2e59c,#64b3f4);*/
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
            display:row;
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
            margin-top: 30px;
            margin-bottom: 20px;
    
        }
        .main {
            text-align: center;
            box-shadow: 0px 0px 5px #000;
            background-color: #fff;
            color: darkred;
            padding: 20px;
        }

        ul {
            display:flex;
            list-style-type: none;
            text-align:right;
            
        }
        li {
            padding:10px;
            margin-right:20px;
        }
        a {
            text-decoration:none;
            font-size:20px;
            padding:10px;
            margin-right:5px;
        }
    </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main"> Welcome, <?php echo $_SESSION['admin_name']; ?></h1><br>
    <div class="container-center">
            <ul>
                <li><a href="">Home</a></li><br>
                <li><a href="application/application.php">Applications</a></li><br>
            </ul>
            <div class="container"> 
                <h1><?php echo $_SESSION['year']."->".$_SESSION['branch']." ".$_SESSION['designation']; ?></h1>
            </div>
    </div>
</body>
</html>