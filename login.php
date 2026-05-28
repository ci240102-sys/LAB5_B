
<?php
session_start();

include 'db.php';

$error = "";

if(isset($_POST['login'])){

    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE matric='$matric'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['matric'] = $matric;

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Invalid Matric or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login Page</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box{
    background: white;
    padding: 40px;
    width: 350px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    text-align: center;
}

h2{
    margin-bottom: 25px;
    color: #2c3e50;
}

input{
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

button{
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    border: none;
    background-color: #3498db;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover{
    background-color: #2980b9;
}

.error{
    color: red;
    margin-top: 15px;
}

.register-link{
    display: block;
    margin-top: 20px;
    text-decoration: none;
    color: #3498db;
}

.register-link:hover{
    text-decoration: underline;
}

</style>

</head>

<body>

<div class="login-box">

<h2>User Login</h2>

<form method="POST">

<input type="text"
name="matric"
placeholder="Enter Matric Number"
required>

<input type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit" name="login">
Login
</button>

</form>

<p class="error">
<?php echo $error; ?>
</p>

<a href="register.php" class="register-link">
Register Here
</a>

</div>

</body>
</html>

