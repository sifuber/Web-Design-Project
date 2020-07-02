<?php

include "./header.php";

if ($_SESSION['admin_rights'] == 0) {
    header("Location: ../landingPage.php");
};

if (isset($_POST['searchText'])) {
    $searchText = $_POST['searchText'];
} else {
    $searchText = null;
};

$result = $dbc->query("SELECT * FROM `pendingregister` WHERE `userName` LIKE '%$searchText%' OR `mail` LIKE '%$searchText%'");
$userResult = $dbc->query("SELECT * FROM `logincredentials` WHERE `userName` LIKE '%$searchText%' OR `mail` LIKE '%$searchText%'");

?>

<div id="main">
    <div id="contentBody2">

        <div class="box4">
            <form action="adminPage.php?search=true" method="POST">
                <input type="text" name="searchText" placeholder="Search User:" class="searchInput">
                <button type="submit" name="searchSubmit">Search</button>
            </form>
        </div>

        <div class='hebebe'>
            <div class="box-special">

                <form action="backend/addUser.php" method="post">
                    <table>
                        <tr>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Mail</th>
                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo ("<tr>");
                            echo ("<td> $row[userName] </td>
                          <td> $row[password] </td>
                          <td> $row[mail] </td>
                          <td> <input type='checkbox' name='selected[]' value='" . implode("+", $row) . "'> </td>
                          <td> <input type='checkbox' name='rejected[]' value='" . implode("+", $row) . "'> </td>");
                            echo ("</tr>");
                        };
                        ?>
                    </table>

                    <button type="submit" id="submit-button1">Submit</button>

                </form>

            </div>

            <div class="box-special">
                <form action="backend/deleteUser.php" method="post">
                    <table>
                        <tr>
                            <th>User Name</th>
                            <th>Mail</th>
                            <th>Admin Rights</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while ($row = $userResult->fetch_assoc()) {
                            echo ("<tr>");
                            echo ("<td> $row[userName] </td>
                          <td> $row[mail] </td>
                          <td> $row[admin_rights] </td>
                          <td> <input type='checkbox' name='selected[]' value='" . implode("+", $row) . "'> </td>");
                            echo ("</tr>");
                        };
                        ?>
                    </table>
                    <button type="submit" id="submit-button2" onclick="confirmDeletion()">Submit</button>
                </form>
            </div>

            <div class="box-special">
                <form action="backend/updateRights.php" method="post">
                    <table>
                        <tr>
                            <th>User Name</th>
                            <th>Current Admin Right</th>
                            <th>Give/Remove Right</th>
                        </tr>
                        <?php
                        $userResult->data_seek(0);
                        while ($row = $userResult->fetch_assoc()) {
                            echo ("<tr>");
                            echo ("<td> $row[userName] </td>
                               <td> $row[admin_rights] </td>
                               <td> <input type='checkbox' name='selected2[]' value='" . implode("+", $row) . "'> </td>");
                            echo ("</tr>");
                        };
                        ?>
                    </table>
                    <button type="submit" id="submit-button3" onclick="confirmChange()">Submit</button>
                </form>

            </div>
    </div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/adminPage.js"></script>
<?php include "./footer.php" ?>