<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mailll = $_POST['email'];
$id = $_POST['rollno'];

$mail = new PHPMailer(true);
                               
$mail->isSMTP();                                            
$mail->Host       = 'smtp.gmail.com;';                    
$mail->SMTPAuth   = true;                             
$mail->Username   = 'smskcodingclub.com@gmail.com';                 
$mail->Password   = 'okov ghml uzzp xzpk';                        
$mail->SMTPSecure = 'tls';                              
$mail->Port       = 587;  
 
$mail->setFrom('smskcodingclub.com@gmail.com', 'codingclub');           
$mail->addAddress($mailll);
      
$mail->isHTML(true);                                  
$mail->Subject = 'welcome to coding club';

$url = "http://localhost/codingclub/registration/registration.php?id=".$id."&mail=".$mailll;
$html = '<head>
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
    button {
        background-color: #007bff;
        color: #fff;
        margin-top: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
       
    }
    
    button:hover {
        background-color: #0056b3;
    }
    .note{
        background-color: orange;
        color: #fff;
        padding: 10px;
    }
</style>
</head>
<body>
<header>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQf48u8MX7Po_QUNlN9b12JeI-rk-H0hDCvGA&usqp=CAU">
</header>
<div class="container-center">
<div class="container">
    <h2>Hello Techie.. Welcome to coding club</h2><hr>
    <ul><h2>steps:</h2>
        <li>click the [register button] and Register yourself..</li>
        <li>your details will be in a <b>honeypot</b> until accepted</li>
        <li>register and contact your class representative</li>
        <li>once your request got accepted , you can login to your account</li>
    </ul>
    <h3>Thank you...</h3>
    <a href="'.$url.'"><button>Register..</button></a><br><br>
    <strong>samskruthi college -coding club</strong>
    <p class="note">Note:<br>  -for security reasons we limited the registrations to only cse branches of samskruthi college .. </p>
</div>
</div>
</body>
</html>';

$mail->Body = $html;
$mail->AltBody = '<a href="'.$url.'">Register</a>';

if($mail->send()){
    header("location: success.html");
}else{
    header("location: failure.html");
}

$mail->smtpClose();
?>