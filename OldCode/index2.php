<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <div id="navbar">
        <button id="hamburger" onclick="openNav()">&#9776;</button>
        <button class="item" href="">Services</button>
        <button class="item" href="">About</button>
        <button id="logout" href="">Log Out</button>
    </div>

    <div id="sidebar">
        <a id="close" onclick="closeNav()">&times;</a>
        <img id="avatar" src="pp.png" alt="">
        <a href="#" id="updateLink">Update Profile</a>
        <a class="test" href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
    </div>

    <div id="main">
        <div id="update">
            <form id="updateForm" action="#" method="POST">
                First Name: <input type="text" name="first_name" class="inputField">
                Last Name: <input type="text" name="last_name" class="inputField">
                Address: <input type="text" name="address" class="inputField">
                GSM: <input type="text" name="phone_number" class="inputField">
                <button type="submit" class="item">Submit</button>
            </form>
        </div>

        <div class="box">

        </div>
        <button class="item3">click to</button>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="script.js"></script>

</html>