<?php
include 'conn.php';
if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amt'];

    $sql = "select * from customers where cid = {$from}";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "select * from customers where cid = {$to}";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Please Enter the Amount in Positive Numbers.")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['cbalance']) {
        echo '<script type="text/javascript">';
        echo 'alert("Insufficient Balance ,Please Add required Amount to Your Account.")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Your Balance Is Zero ,Please Add Amount to Your Account.')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['cbalance'] - $amount;
        $sql = "UPDATE customers set cbalance=$newbalance where cid=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['cbalance'] + $amount;
        $sql = "UPDATE customers set cbalance=$newbalance where cid=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['cname'];
        $receiver = $sql2['cname'];
        $sql = "INSERT INTO transaction(sender, receiver, amount) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>window.location='transferdata.php';</script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparks Bank</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/transfer.css">
</head>

<body>
    <?php include 'php/header.php'; ?>
    <section class="container">
        <div class="content">
            <h1 class="c-heading">Transfer</h1>
            <hr>
            <form method="post" class="transfer-frm">
                <h2 id="from">From<h2>
                        <?php
                        include 'conn.php';

                        $customer_id = $_GET['id'];

                        $sql = "SELECT * FROM customers where cid = {$customer_id}";

                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

                        if (mysqli_num_rows($result) > 0) {
                        ?>
                            <table id="customers-table" border="1">
                                <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Gmail</th>
                                    <th>Available Balance</th>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td name="cus_id"><?php echo $row['cid']; ?></td>
                                            <td><?php echo $row['cname']; ?></td>
                                            <td><?php echo $row['cmail']; ?></td>
                                            <td><?php echo $row['cbalance']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No rows in the table";
                        }
                        ?>
                        <h2 id="to">To</h2>
                        <?php
                        $sql = "SELECT * FROM customers where cid != {$customer_id}";

                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

                        if (mysqli_num_rows($result) > 0) {

                        ?>
                            <select name="to" class="drop-down">
                                <option value="" selected disabled>Select Recipient</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['cid']; ?>">

                                        <?php echo $row['cname']; ?> (Balance:
                                        <?php echo $row['cbalance']; ?> )

                                    </option>
                                <?php } ?>
                            </select>

                        <?php } else {
                            echo "No rows in the table";
                        }

                        ?>
                        <input type="number" name="amt" placeholder="Amount" required id="amount">
                        <div class="trans"><button type="submit" name="submit" class="transfer-btn">Transfer</button></div> 
                      
            </form>
        </div>
    </section>
     
</body>

</html>