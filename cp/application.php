<?php
session_start();

if(!$_SESSION['admin_login']){
    header('location: /codingclub/cp');
    die();
}

$admin_year = $_SESSION['year'];
$admin_branch = $_SESSION['branch'];

$hostname = 'localhost';
$user = 'root';
$password = '';
$db = 'codingclub';
$conn = new mysqli($hostname,$user,$password,$db);

if ($conn->connect_error)
{
    die("connection failed :".$conn->connect_error);
}


$sql = "select * from honeypot where year = '$admin_year' AND branch = '$admin_branch'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_all(MYSQLI_ASSOC);

if(empty($result)){
    $err = "no applications";
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
    </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main"><?php echo $_SESSION['admin_name']; ?></h1>
    <div class="container-center">
        <?php
           foreach($result as $row) {
        ?>
            <div class="container">
                <?php 
                echo print_r($result);

                ?>
            </div>
        <?php
           }
        ?>
    </div>
</body>
</html>
