<?php
session_start();

if(!$_SESSION['login']) {
    header('Location: /codingclub/login/index.html');
}
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
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
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
    </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <div class="container">
       
    </div>
</body>
</html>