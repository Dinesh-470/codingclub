<?php 
include('connect.php');

if (isset($_GET['id'])) {
    $profileId = $_GET['id'];
}else{
    echo "no profile selected";
}

$query = "SELECT * FROM student_details WHERE rollno = '$profileId'";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codingclub</title>
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
            position: relative;
        }
        .main {
            text-align: center;
            box-shadow: 0px 0px 5px #000;
            background-color: #fff;
            color: darkred;
            padding: 20px;
        }
        .badge {
            position: absolute;
            top: 1px;
            right: 1px;
            background-color: #fff;
            color: #000;
            padding: 12px;
            border-radius: 0% 0% 30% 30%;
            font-size: 14px;
            font-weight:bolder;
            opacity: 0.6;
            border: 3px solid #000;
        }
        .container .img {
            margin-top: 13px;
            border: 1px solid pink;
            border-radius: 5% 5% 20% 20%;
            overflow: hidden;
            height: 70%;
            width: 100%;
            box-shadow:2px 2px 10px #2e9e75;
        }
        .container .img img {
            height: 100%;
            width: 100%;
            object-fit:contain;
            border-radius: 5% 5% 20% 20%;            
        }
        .name{
            color: #252525;
            margin-left: 10px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 80%;
            padding-left: 20px;
        }
    </style>
</head>
<body>
<header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main"><?php echo $row['name']; ?></h1><br>
    <div class="container-center">
    <div class="container">
        <span class="badge"><?php echo $row['designation']; ?></span>
        <div class="img">
            <img src="<?php echo $row['image']; ?>">
        </div>
        <div class="name"><h1><?php echo $row['rollno']; ?></h1></div>
        <div class="name"><h1><?php echo $row['year']; ?>==><?php echo $row['branch']; ?></h1></div>
    </div>
    </div>
</body>
</html>