<?php
session_start();

if(!$_SESSION['login']) {
    header('Location: /codingclub/login/index.html');
}include('connect.php');

$query = "SELECT * FROM login";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();
if($row == null) {
    echo "no user found";
    die();
}
$query2 = "SELECT rollno FROM control";
$result2 = mysqli_query($conn,$query2);
$row2 = $result2->fetch_all();
$leads = array_column($row2,0);

function lead($conn,$id) {
    $query = "SELECT * FROM student_details where rollno = '$id'";
    $result = mysqli_query($conn,$query);
    $row = $result->fetch_assoc();
    return $row;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding club</title>
    <link rel="icon" href="/codingclub/assets/images/smsk2.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            text-align: center;
        }
        .main {
            text-align: center;
            box-shadow: 0px 0px 5px #000;
            background-color: #fff;
            color: darkred;
            padding: 20px;
        }
        h1 {
            font-size: 25px;
        }
        h2 {
            font-size: 20px;
        }
        a {
            text-decoration: none;
            color: #f4f4f4;
        }
        input[type="search"] {
            margin-top: 0px;
            height:10%;
            width: 100%;
            max-width: 500px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        hr {
          width:30%;
        }
        .imggg {
            width: 100px;
            height: 100px;
            box-shadow: 2px 2px 10px #000;
        }
        .line {
            margin-top: 0px;
        }
        .img_container {
            display: flex;
        }
        </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <h1 class="main">PROFILES</h1><br>
    <p>search for profiles..<p>
        <div class="container">

        <input type="search" placeholder="search for profile" autocomplete="on" id="rollno">
        <br><br>
        <div id="searchresults">

        </div>
        </div>
 
    <div class="quicklinks">
        <h2>quick links</h2><p class="line">------------------</p>
        <h2>Coding Club Team</h2>
        <div class="img_container">
        <?php 
            foreach($leads as $lead) {
                $resultt = lead($conn,$lead);
        ?>
        <div class="user_details">
                <h3><?php echo $resultt["designation"]; ?></h3>
                <a href="/codingclub/profiles/profile.php?id=<?php echo $resultt["rollno"]; ?>"><img src="<?php echo $resultt['image']; ?>" class="imggg"></a>
        </div>
        <?php
            }
        ?>
        </div>  
    </div>
    <script>
    $('#rollno').on('input', function () {
        var searchTerm = $(this).val();
        if (searchTerm === '') {
            $('#searchresults').empty();
            return;
        }

        $.ajax({
            url: 'profilesearch.php',
            method: 'POST',
            data: { searchTerm: searchTerm },
            success: function (response) {
                $('#searchresults').html(response);
            }
        });
    });
</script>
</body>