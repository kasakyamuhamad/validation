<!DOCTYPE html>
<html>
<head>
    <style>
        .error { color:darkgreen;}
    </style>
</head>
<body>

<?php
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $website = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) {
            $nameErr = "Bambi enter a valid name";
        }
        else {
            $name = test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-']*$/",$name)) {
                $nameErr = "Only letters and white sapces allowed";
            }
        }
    }

    if(empty($_POST["email"])) {
        $emailErr = "Valid Email Address";
    }
    else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // email address is not valid
        }
         {
            $emailErr = "The email address is incorrect";
        }
    }
    if(empty($_POST["website"])) {
        $website = "";
    }
    else {
        $website = test_input(($_POST["website"]));
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            // $website is not a valid URL
        }
        {
            $websiteErr = "Enter a valid website URL"; 
        }
    }
 
    if(empty($_POST["comment"])) {
       $comment = "";
    }
    else {
        $comment = test_input($_POST["comment"]);
    }
    
    if(empty($_POST["gender"])){
    $genderErr = "Please select a gender";
    }
    else {
        $gender = test_input(($_POST["gender"]));
    }
    
    function test_input ($data) {
        if (ini_get('magic_quotes_gpc')) {
            $data = stripslashes($data);
            }
            $data = trim($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            return $data;    
    }
    ?>

    <h2> PHP Form Validation</h2>
    <p> <span class="Error">* required field </span></p>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>">
    Full Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br> <br>
    Email: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br> <br>
    Number (Optional): <input type="text" name="number">
    <span class="error">* <?php echo $numberErr;?></span>
    <br> <br>
    Website: <input type="text" name="website">
    <br> <br>
    Comment: <textarea name="comment"  rows="10n" cols="20"></textarea>
    <span class="error">* <?php echo $commentErr;?></span>
    <br> <br>
    Gender: 
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <span class="error">* <?php echo $genderErr;?></span>
    <br> <br>
    <input type="submit" name="click here" value="click here">
</form>

<?php
    echo "<h2> Your input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    echo "<br>";
?>

</body>
</html>