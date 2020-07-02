<?php include "./header.php"; ?>

<main class="update">
        <form class="update-form" action="backend/update.php" method="post">

            <input class="update-data" type="text" placeholder="First Name" name="fname">
            <br>
            <input class="update-data" type="text" placeholder="Last Name" name="sname">
            <br>
            <input class="update-data" type="text" placeholder="Address" name="address">
            <br>
            <input class="update-data" type="text" placeholder="Phone Number" name="phone">
            <br>
            <input class="update-data" type="submit" value="Submit">

        </form>
</main>

<?php include "./footer.php" ?>