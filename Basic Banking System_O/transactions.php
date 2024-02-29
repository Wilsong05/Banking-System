<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparks Bank</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/customer.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <?php include 'php/header.php'; ?>
    <section class="container">
        <div class="content">
            <h1 class="c-heading">All Transactions</h1>
            <hr>
            <?php
            include 'conn.php';

            $sql = "SELECT * FROM transaction";

            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

            if (mysqli_num_rows($result) > 0) {

            ?>
                <table id="customers-table">
                    <thead>
                        <th class="firstth">Id</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th class="lastth">Date and Time</th>
                    </thead>

                    <tbody>
                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <tr>
                                <td><?php echo $row['sno']; ?></td>
                                <td><?php echo $row['sender']; ?></td>
                                <td><?php echo $row['receiver']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['datetime']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                echo "No rows in the table";
            }
            ?>
        </div>
        </div>
    </section>
    <?php include 'php/footer.php'; ?>
</body>

</html>