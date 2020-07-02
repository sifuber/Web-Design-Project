<?php

include "./header.php";
$_SESSION['start_time'] = time();

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<div id="main">
    <div id="contentBody">

        <div class="box3">
            <p>You are earning <span style="font-weight: bold; font-size: 150%;">MONEY!</span></p>
            <div id="timer">

                <span class="inner-time">00 : 00 : 00</span>
            </div>
            <button id="submitWorkButton" name="submitWork" onclick="isOk()">Submit Work</button>
        </div>

    </div>

</div>

<script src="js/workPage.js"></script>
<?php include "./footer.php" ?>