
<?php
session_start();

if(!isset($_SESSION['matric'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

if(isset($_GET['matric'])){

    $matric = $_GET['matric'];

    $delete = mysqli_query($conn,
    "DELETE FROM users WHERE matric='$matric'");

    if($delete){
        echo "
        <script>
            alert('User deleted successfully!');
            window.location='dashboard.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Failed to delete user!');
            window.location='dashboard.php';
        </script>
        ";
    }

} else {

    echo "
    <script>
        alert('Invalid Request!');
        window.location='dashboard.php';
    </script>
    ";
}
?>

