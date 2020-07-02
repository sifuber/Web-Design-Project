<?php include "./header.php";

$result = $dbc->query("SELECT `hourly_rate` FROM `salary`");
$row = $result->fetch_assoc();
$rate = $row['hourly_rate'];

?>

<PageBody>
    <div id="main">

        <div id="contentBody2">
            <div class="box">
                <?php echo ("<p> Current Rate is: $rate \$"); ?>
                <form action="backend/updateHourly.php" method="post">
                    <p>Change Rate:</p>
                    <input type="text" name="hourly-rate">
                    <button class="submit-button">Submit</button>
                </form>

            </div>

        </div>

    </div>
</PageBody>

<?php include "./footer.php" ?>