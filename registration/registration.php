<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding club -Register</title>
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
          
        .login-form {
            max-width: 400px;
            margin: 0 auto;
        }
        .login-form h2{
            font-size: 20px;
            margin-top: 2px;
            margin-bottom: 35px;
            text-align: center;
        } 
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: 15px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"],
        .option {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        h4 {
            padding-top: 10px;
            margin-top: 0px;
            margin-bottom:0px;
            font-size: 15px;
        }
        .rollno {
            background-color: orange;
            text-align: center;
        }
        .but1{
           float: right;
        }
        .but2 {
            float: right;
            background-color: #3fa663;
            color: #fff;
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .but2:hover {
           background-color: #194729;
        }
        .roolno2 {
            background-color:#fff;
            text-align: center;
            color: #000;
            padding: 0px;
        }
        .fillon {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <header>
        <img src="/codingclub/assets/images/smsk1.png">
    </header>
    <?php 
    if (isset($_GET['id'])) {
        $profileId = $_GET['id'];
        $roolno = strtoupper($profileId);
        if(isset($_GET['mail'])){
            $mail = $_GET['mail'];
        }else{
            header('location: index.html');
        }
    }else {
        header('location: index.html');
    }  

    ?>
    <div class="container-center">
    <div class="container">
        <form class="login-form" id="registration-form" method="post" action="/codingclub/assets/register.php"  enctype="multipart/form-data">
            <h2>Student-Registration</h2>
            <h4>Registration for :-<div class="rollno"><?php echo $roolno; ?></div></h4><hr>
            <div class="form-group form-step">
                <label for="username">ROLL NO:</label>
                <input type="text" name="rollno"  value="<?php echo $roolno; ?>" readonly class="roolno2">
                <br>
                <label for="username">FIRST NAME:</label>
                <input type="text" id="username" name="firstname" required>
                <br>
                <label for="password">LAST NAME:</label>
                <input type="text" id="name" name="lastname" required>
                <br>
                <button type="button"  class="but1" onclick="nextStep(0)">Next</button>
            </div>
            <div class="form-group form-step">
                <label for="additionalInfo">EMAIL:</label>
                <input type="text"  name="email" value="<?php echo $mail; ?>" readonly>
                <br>
                <label for="additionalInfo">MOBILE NUMBER:</label>
                <input type="text" id="additionalInfo" name="number" required>
                <br>
                <button type="button" onclick="prevStep(1)">Previous</button>
                <button type="button" class="but1" onclick="nextStep(1)">Next</button>
            </div>
            <div class="form-group form-step">
                <label for="additionalInfo">IMAGE:</label>
                <h4>select your image </h4>
                <input type="file" name="image" required class="option fileonn"><br>
                <button type="button" onclick="prevStep(2)">Previous</button>
                <button type="button" class="but1" onclick="nextStep(2)">Next</button>
            </div>
            <div class="form-group form-step">
                <label for="year">YEAR</label>
                <select id="year" name="year" required class="option">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
                <br>
                <label for="year">BRANCH</label>
                <select id="year" name="branch" required class="option">
                <option value="CSE">CSE</option>
                <option value="CSE-DS">CSE(DS)</option>
                <option value="CSE-AIML">CSE(AI&ML)</option>
                </select>
                <br>
                <button type="button" onclick="prevStep(3)">Previous</button>
                <button type="button" class="but1" onclick="nextStep(3)">Next</button>
            </div>
            <div class="form-group form-step">
                <label for="additionalInfo">PASSWORD:</label>
                <input type="password" id="additionalInfo" name="password1" required>
                <br>
                <label for="additionalInfo">PASSWORD(AGAIN):</label>
                <input type="text" id="additionalInfo" name="password2" required>
                <br>
                <button type="button" onclick="prevStep(4)">Previous</button>   
                <button type="submit" class="but2">Submit</button>            
            </div>
            <!--<button type="submit">register</button>-->
        </form>
    </div>
    </div>

    <script>
        const form = document.getElementById('registration-form');
        const formSteps = form.querySelectorAll('.form-step');

        function nextStep(currentStep) {
            formSteps[currentStep].style.display = 'none';
            formSteps[currentStep + 1].style.display = 'block';
        }

        function prevStep(currentStep) {
            formSteps[currentStep].style.display = 'none';
            formSteps[currentStep - 1].style.display = 'block';
        }

        formSteps[0].style.display = 'block';
        formSteps[1].style.display = 'none';
        formSteps[2].style.display = 'none';
        formSteps[3].style.display = 'none';
        formSteps[4].style.display = 'none';
    </script>
</body>
</html>