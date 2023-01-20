<!DOCTYPE html>
<html>
<head>
<body>
    
    <?php
        // define variables and set to empty values
        $fullname = $email = $gender = $comment = $number = $age = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $gender = test_input($_POST["gender"]);
            $comment = test_input($_POST["comment"]);
            $number = test_input($_POST["number"]);
            $age = test_input($_POST["age"]);
         }   

         function test_input($data) {
            if (ini_get('magic_quotes_gpc')) {
                $data = stripslashes($data);
            }
            $data = trim($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            return $data;    
        }
    ?>  

    <h2> Form Validation  </h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>">
    Full Name: <input type="text" name="name">
    <br> <br>
    Email: <input type="text" name="email">
    <br> <br>
    Number (Optional): <input type="text" name="number">
    <br> <br>
    Age: <input type="text" name="age">
    <br> <br>
    Comment: <textarea name="comment"  rows="10n" cols="20"></textarea>
    <br> <br>
    Gender: 
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <br> <br>
    <input type="submit" name="click here" value="click here">
</form>


    <?php
        echo "<h2> Your input:</h2>";
        echo $fullname;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $number;
        echo "<br>";
        echo $age;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        echo "<br>";
    ?>
    
</body>   
</html>