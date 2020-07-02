<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/index.css">
</head>

<body class="index-body">

    <img id="logo" src="images/logo.png" alt="" height="400px">

    <div class="in-form">

        <div id=login class="input-group">

            <form class="input-group" action="/backend/login.php" method="post">
                <input type="text" class="input-field" name="id" placeholder="User Name" required>
                <input type="password" class="input-field" name="pwd" placeholder="Password" required>
                <button type="submit" name="login-submit" class="submit-button">Log In</button>
            </form>

        </div>

        <div id=register class="input-group">

            <form class="input-group" action="/backend/register.php" method="post">
                <input type="text" class="input-field" name="user-name" placeholder="User Name" required>
                <input type="text" class="input-field" name="mail" placeholder="E-Mail" required>
                <input type="password" class="input-field" name="pwd" placeholder="Password" required>
                <input type="password" class="input-field" name="pwd-repeat" placeholder="Repeat Password" required>
                <button type="submit" name="register-submit" class="submit-button">Register</button>
            </form>

        </div>

        <div class="login-register">
            <div id="button"></div>
            <button type="button" class="toggle-button" onclick="login()">Log In</button>
            <button type="button" class="toggle-button" onclick="register()">Register</button>
        </div>

    </div>

    <script src="\js\index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        function parseParse(url) {
            var params = {};
            var parser = document.createElement("a");
            parser.href = url;
            var query = parser.search.substring(1);
            var vars = query.split("&");
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                params[pair[0]] = decodeURIComponent(pair[1]);
            }
            return params;
        }

        var errors = parseParse(window.location.href);

        var text2 = errors['error'];
        var text3 = errors['register'];

        if (text2 == 'invalidusername') {
            Swal.fire({
                title: 'Error!',
                text: 'Username is Invalid!',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        } else if (text2 == 'invalidmail') {
            Swal.fire({
                title: 'Error!',
                text: 'Mail is Invalid!',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        } else if (text2 == 'pwdmismatch') {
            Swal.fire({
                title: 'Error!',
                text: 'Passwords do not match!',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        } else if (text2 == 'nametaken') {
            Swal.fire({
                title: 'Error!',
                text: 'Username is taken!',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        } else if (text2 == 'nosuchuser' || text2 == 'wrongpwd') {
            Swal.fire({
                title: 'Error!',
                text: 'Wrong Credentials!',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        } else if (text3 == 'success') {
            Swal.fire({
                title: 'Success!',
                text: 'Wait for your approval!',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        }
    </script>
</body>

</html>