<?php
include "db_conn.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Data updated successfully!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD APPLICATION</title>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="add_new.php">
            <img src="images/scribble.png" width="30" height="30" class="d-inline-block align-top" alt="">
            PHP CRUD APP
        </a>
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after making changes</p>
        </div>
    </div>
    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container d-flex justify-content-center">
        <form action="" method="POST" style="width:50vw; min-width:300px;">
            <div class="row">
                <div class="col">
                    <label for="" class="form-label text-muted">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label text-muted">Surname:</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label text-muted">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                </div>
            </div>
            <br />
            <div class="form-group mb-3">
                <label for="">Gender:</label>&nbsp;
                <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender'] == 'male') ? "checked" : ""; ?>>
                <label for="male" class="form-input-label text-muted">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender'] == 'female') ? "checked" : ""; ?>>
                <label for="female" class="form-input-label text-muted">Female</label>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>