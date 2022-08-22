<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="/register" method="POST">
    <?php set_csrf()?>    
    <p><input type="email" name="email" placeholder="email"></p>
    <p><input type="password" name="password" placeholder="password"></p>
    <p><input type="password" name="password-verify" placeholder="repeat-password"></p>
    <p><input type="submit" value="Register"></p>
    </form>
</body>
</html>