<?php include "./header.php";

$result = $dbc->query("SELECT * FROM `usercredentials`");

?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

<div id='main'>

    <div class="box5">
        <form name="messageForm" action="backend/sendMessage.php" method="post">
            <select id="dropdown" name="dropdown">
                <option>Search Employee</option>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo ("<option val=$row[u_index]>$row[firstName]</option>");
                };
                ?>
            </select>
            <textarea class="messageTextArea" name="messageBox" cols="30" rows="10"></textarea>
            <button type="submit" class="submit-button2">Send</button>

        </form>
    </div>

    <script>
        $("#dropdown").chosen();
    </script>
</div>

<?php include "./footer.php" ?>