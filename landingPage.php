<?php include "./header.php"; ?>

<PageBody>

    <div id="main">

        <div id="update">
            <form id="updateForm" action="backend/update.php" method="POST" enctype="multipart/form-data">
                First Name: <input type="text" name="first_name" class="inputField" required>
                Last Name: <input type="text" name="last_name" class="inputField" required>
                Address: <input type="text" name="address" class="inputField" required>
                GSM: <input type="text" name="phone_number" class="inputField" required>
                Profile Picture: <input type="file" name="file">
                <button type="submit" id="submit-button">Submit</a>
            </form>
        </div>

        <div id="contentBody">

            <div class="box">

                <div id="welcome">
                    <?php
                    if ($userRow) {
                        echo ("<p>Welcome $userRow[2]</p><br>");
                    } else {
                        echo ('<p>Update Your Profile</p><br>');
                    }
                    ?>
                </div>

                <div id="thisRow">

                    <?php
                    if ($_SESSION['admin_rights'] == 0) {
                        echo ('<a id="workButton" href="workPage.php">Start Work</a>');
                    } elseif ($_SESSION['admin_rights'] == 1) {
                        echo ('<a id="workButton" href="messagePage.php">Send Message</a>');
                    }
                    ?>

                    <?php
                    $mins = intval((time() - $_SESSION['loginTime']) / 60);
                    $result = $dbc->query("SELECT `hourly_rate` FROM `salary`");
                    $row = $result->fetch_assoc();
                    $rate = $row['hourly_rate'];
                    echo ("<p class='textRow'> You could have worked for $mins minutes. (Hourly Rate is $rate\$)</p>");
                    ?>

                    <img src="images/money.gif" alt="" height="150px">

                </div>

            </div>

            <div class="box">
                <table>
                    <tr>
                        <th>Message Info</th>
                        <th>Message From</th>
                    </tr>
                    <?php

                    $result = $dbc->query("SELECT * FROM `messages` WHERE `message_to` = $_SESSION[user_id] ORDER BY `message_index` DESC");

                    $count = 0;
                    while ($row = $result->fetch_assoc()) {

                        $result2 = $dbc->query("SELECT `firstName` FROM `usercredentials` WHERE `u_index` = $row[message_from] ");
                        $firstName = $result2->fetch_assoc();

                        if ($count < 5) {
                            echo ("<tr>");
                            echo ("<td> $row[message] </td><td> $firstName[firstName]</td>");
                            echo ("</tr>");
                            $count += 1;
                        } else break;
                    };
                    ?>
                </table>
            </div>
        </div>

    </div>

</PageBody>

<?php include "./footer.php" ?>