
<?php
session_start();

if(!isset($_SESSION['matric'])){
    header("Location: login.php");
}

include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<style>

body{
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    padding: 30px;
}

.container{
    width: 90%;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

h2{
    color: #333;
}

.top-bar{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.logout-btn{
    background-color: #e74c3c;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
}

.logout-btn:hover{
    background-color: #c0392b;
}

table{
    width: 100%;
    border-collapse: collapse;
}

th{
    background-color: #2c3e50;
    color: white;
    padding: 12px;
}

td{
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

tr:hover{
    background-color: #f2f2f2;
}

.action-btn{
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 14px;
}

.update-btn{
    background-color: #3498db;
}

.update-btn:hover{
    background-color: #2980b9;
}

.delete-btn{
    background-color: #e74c3c;
}

.delete-btn:hover{
    background-color: #c0392b;
}

</style>

</head>

<body>

<div class="container">

<div class="top-bar">
    <h2>User Dashboard</h2>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>
</div>

<table>

<tr>
    <th>Matric</th>
    <th>Name</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['matric']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo ucfirst($row['role']); ?></td>

<td>

<a class="action-btn update-btn"
href="update.php?matric=<?php echo $row['matric']; ?>">
Update
</a>

<a class="action-btn delete-btn"
href="delete.php?matric=<?php echo $row['matric']; ?>"
onclick="return confirm('Are you sure you want to delete this user?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>

