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
    <link rel="stylesheet" href="css/customer.css">
    <link rel="stylesheet" href="css/transferdata.css">
</head>

<body>
    <?php include 'php/header.php'; ?>
    <section class="container">
        <?php
        include 'conn.php';

        $sql = "SELECT * FROM transaction ORDER BY sno DESC LIMIT 1";

        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
        $row = mysqli_fetch_array($result);
        ?>
        <div class="content">
            <h1 class="c-heading">Transaction Successful</h1>
            <hr>
            <p>Amount Rs. <span id="amt-sent"><strong><?php echo $row['amount']; ?></strong></span> /- has being successfuly transfered to <span id="rep-name"><strong><?php echo $row['receiver']; ?></strong></span>
                <a href="transactions.php"><button class="btn1">View All Transactions</button> </a>
        </div>
    </section>
    
</body>

</html>