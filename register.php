
<?php
include 'db.php';

$message = "";

if(isset($_POST['submit'])){

    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE matric='$matric'");

    if(mysqli_num_rows($check) > 0){

        $message = "Matric number already registered!";

    } else {

        $sql = "INSERT INTO users(matric, name, password, role)
                VALUES('$matric','$name','$password','$role')";

        if(mysqli_query($conn, $sql)){

            echo "
            <script>
                alert('Registration Successful!');
                window.location='login.php';
            </script>
            ";

        } else {

            $message = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>User Registration</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-box{
    background: white;
    width: 400px;
    padding: 35px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

h2{
    text-align: center;
    color: #2c3e50;
    margin-bottom: 25px;
}

input, select{
    width: 100%;
    padding: 12px;
    margin-top: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

button{
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    background-color: #2ecc71;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover{
    background-color: #27ae60;
}

.message{
    text-align: center;
    color: red;
    margin-top: 15px;
}

.login-link{
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #3498db;
}

.login-link:hover{
    text-decoration: underline;
}

</style>

</head>

<body>

<div class="register-box">

<h2>User Registration</h2>

<form method="POST">

<input type="text"
name="matric"
placeholder="Enter Matric Number"
required>

<input type="text"
name="name"
placeholder="Enter Full Name"
required>

<input type="password"
name="password"
placeholder="Enter Password"
required>

<select name="role">

<option value="student">Student</option>
<option value="lecturer">Lecturer</option>

</select>

<button type="submit" name="submit">
Register
</button>

</form>

<p class="message">
<?php echo $message; ?>
</p>

<a href="login.php" class="login-link">
Go To Login
</a>

</div>

</body>
</html>
