<?php

include('connect.php');

$sql = "select rollno from student_details";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_all();
$students = array_column($result,0);

function search($students, $name, $limit = 5) {
    $matchingResults = [];
    foreach ($students as $ele) {
        if (strpos($ele, $name) !== false) {
            $matchingResults[] = $ele;
            if (count($matchingResults) >= $limit) {
                break;
            }
        }
    }
    return $matchingResults;
}

function stud_details($conn,$id) {
    $sql = "select * from student_details where rollno = '$id'";
    $res = mysqli_query($conn,$sql);
    $result = $res->fetch_assoc();
    return $result;
}

$searchTerm = $_POST['searchTerm'];
$searchResults = search($students, $searchTerm);

foreach ($searchResults as $result) {
    $studentDetails = stud_details($conn,$result);
    $html = '
    <style>
        .center{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .container2 {
            display:flex;
            width:280px;
            height:100px;
            max-height:400px;
            max-width: 400px;
            border: 1px solid #fff;
            background-color: #262626;
            justify-content: center;
            align-items: center;
            box-shadow:2px 0px 10px green;
        }
        .container2 img {
            width: 150px;
            height: 80px;
            max-height:300px;
            max-width:300px;
            border: 1px solid red;
            border-radius: 0% 30% 30% 0%;
            object-fit: contain;
            background-color:#fff;
        }
        .details {
            flex:content;
            text-align: center;
        }
    </style>
    <div class="center">
    <a href="/codingclub/profiles/profile.php?id='.$studentDetails["rollno"].'">
    <div class="container2">
        <img src="'.$studentDetails["image"].'">
        <div class="details">
        <h1>'.$studentDetails["rollno"].'</h1>
        <h2>'.$studentDetails["name"].'</h2>
        </div>
    </div>
    </a>
    </div>';

    echo "<div>" . $html . "</div>";
}
?>