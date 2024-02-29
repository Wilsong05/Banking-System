<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/createusers.css">
    <link rel="stylesheet" href="css/footer.css"> 
</head>

<body>
    <?php
    include 'conn.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $balance = $_POST['balance'];

        $sql = "insert into customers(cname,cmail,cbalance) values('{$name}','{$email}','{$balance}')";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
        if ($result) {
            echo "<script>
          alert('New Account Created Successfully!');
        window.location = 'customers.php';
    </script>";
        }
    }

    ?>

    <?php
    include 'php/header.php';
    ?>
     
        <div class="head-div">
            <h2 class="c-heading">Create  Account</h2>
            <hr>
        </div>

  
        
            <div class="container">
                <div class="screen">
                    <div class="screen-body-item">
                        <form class="app-form" method="post">
                            <div class="app-form-group">
                                <input class="app-form-control" placeholder="ENTER NAME" type="text" name="name" required>
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" placeholder="ENTER EMAIL" type="email" name="email" required>
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" placeholder="ENTER INTIAL DESPOSIT ACCOUNT" type="number" name="balance" required>
                            </div>
                            <br>
                            <div class="app-form-group button">
                                <input class="app-form-button" type="submit" value="CREATE  ACCOUNT" name="submit"></input>
                                <input class="app-form-button" type="reset" value="RESET" name="reset"></input>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
             <?php include 'php/footer.php'; ?>
</body>

</html>