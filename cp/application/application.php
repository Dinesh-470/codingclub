<?php
session_start();

if(!$_SESSION['admin_login']){
    header('location: /codingclub/cp');
    die();
}

$admin_year = $_SESSION['year'];
$admin_branch = $_SESSION['branch'];

include("connect.php");

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
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin:20px 10px;
            overflow: auto;
        }
        .main {
            text-align: center;
            box-shadow: 0px 0px 5px #000;
            background-color: #fff;
            color: darkred;
            padding: 20px;
        }
        .userimg {
            width: 80%;
            height: 50%;
            max-height: 600px;
            border-radius: 50%;
        }
            
        button {
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 10px 10px #000;
        }
        .accept {
            background-color: green;
        }
        .decline {
            background-color: red;
        }
    </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main">Welcome, <?php echo $_SESSION['admin_name']; ?></h1><br>
    <h2>your class applications:</h2>
    <div class="container-center">
        <?php 
            foreach($result as $row) {
        ?>
            <div class="container"> 
                <h1><?php echo $row['rollno']; ?></h1><hr>
                <img class="userimg" src="<?php echo $row['image']; ?>">
                <h2><?php echo $row['name']; ?></h2>
                <h2 class="mail"><?php echo $row['email']; ?></h2>
                <h2><?php echo $row['number']; ?></h2>
                <h3><?php echo $row['year']; ?> ==> <?php echo $row['branch']; ?></h3>
                <button type="submit" class="decline" onclick="account('decline','<?php echo $row['rollno']; ?>');">decline</button>
                <button type="submit" class="accept" onclick="account('accept','<?php echo $row['rollno']; ?>');">accept</button>
            </div>
        <?php
        }
        ?>
    </div>

    <script>
        function account(text,number) {
            const loc = "account.php?text=";
            const info = loc.concat(text);
            const andd = "&id="
            const addd = info.concat(andd);
            const link = addd.concat(number);
            window.location.href = link;
        }
    </script>
    <script>
        var num=1;
        function reload() {
            window.location.reload();
            var =+1;
        }
        if(num != 1) {
            reload();
        }
    </script>
</body>
</html>