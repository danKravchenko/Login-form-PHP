<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat-password'];

if (empty($username) || empty($email) || empty($password) || empty($repeatPassword)) { ///// checking not full field
    $text = 'Some fields are not filled!';
} else if ($password == $repeatPassword) { //// checking the correctness of the retyped password
    $bd = mysqli_connect('localhost', 'root', '', 'site_data'); //// connecting to base data
    $query = "INSERT INTO registration_data(Username, Email, User_password) VALUES('" . $username . "', '" . $email . "', '" . $password . "')"; //// text of SQL query
    $res = mysqli_query($bd, $query); //// SQL query

    if ($res == true) { //// checking the result
        $text =  'Congratulations! You are registered';
    }

    mysqli_close($bd); //// closing  base data
} else { //// if not correct inputting of the retyped password
    $text = 'Incorrectly typed password!';
}
?>

<html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<body>
    <h1><?= $text ?></h1>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: rgb(233, 233, 233);
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</body>

</html>