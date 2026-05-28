
<?php
session_start();

if(!isset($_SESSION['matric'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

if(!isset($_GET['matric'])){
    header("Location: dashboard.php");
    exit();
}

$matric = $_GET['matric'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE matric='$matric'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $newMatric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $update = mysqli_query($conn,

    "UPDATE users SET
    matric='$newMatric',
    name='$name',
    role='$role'
    WHERE matric='$matric'");

    if($update){

        echo "
        <script>
            alert('User updated successfully!');
            window.location='dashboard.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Failed to update user!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Update User</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.update-box{
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
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover{
    background-color: #2980b9;
}

.back-link{
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #3498db;
}

.back-link:hover{
    text-decoration: underline;
}

</style>

</head>

<body>

<div class="update-box">

<h2>Update User</h2>

<form method="POST">

<input type="text"
name="matric"
value="<?php echo $row['matric']; ?>"
required>

<input type="text"
name="name"
value="<?php echo $row['name']; ?>"
required>

<select name="role">

<option value="student"
<?php if($row['role']=="student") echo "selected"; ?>>
Student
</option>

<option value="lecturer"
<?php if($row['role']=="lecturer") echo "selected"; ?>>
Lecturer
</option>

</select>

<button type="submit" name="update">
Update User
</button>

</form>

<a href="dashboard.php" class="back-link">
Back To Dashboard
</a>

</div>

</body>
</html>
