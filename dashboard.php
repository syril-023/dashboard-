<?php
include 'config.php';
session_start();
ob_start();
$username = $_SESSION['u'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <div class="container justify-content-center align-items-center">
        <h1 class="text-center">Welcome <?php echo $username; ?></h1>
        <div class="row">
            <div class="col-md-12">
            <form action="#" class="form-group" method="post">
            <div class="row text-center border p-3">
                <div class="col-md-3 mt-2">
                    <label for="name">Name:</label>
                </div>
                <div class="col-md-9 mt-2">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="age">Age:</label>
                </div>
                <div class="col-md-9 mt-2">
                    <input type="text" class="form-control" id="age" name="age" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="dob">DOB:</label>
                </div>
                <div class="col-md-9 mt-2">
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="col-md-3 mt-2"></div>
                <div class="col-md-9 mt-2">
                    <input type="submit" id="submit" name="submit" class="btn btn-success w-100" value="Register">
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>    
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age = $_POST['age'];
    $date= new DateTime($_POST['dob']);
    $dob = $date->format('Y-m-d');
    $sql=mysqli_query($conn,"insert into profile_details(name,age,dob,created_by,created_on) values
                            ('$name',$age,$dob,'$username',NOW())");
    if($sql){
        header('location:profile.php');
    }
    else{
        echo "<script>alert('Invalid insertion');</script>";
    }
 }
 ?>