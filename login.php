<?php
session_start();
if(isset($_SESSION['nama'])){
    header("location:input.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup/Login</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        input[type="text"] {
            /* width: 100%; */
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 0 5px lightgray;
        }
        input[type="password"] {
            /* width: 100%; */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 5px lightgray;
        }
        input[type="submit"] {
            background-color: royalblue;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: cornflowerblue;
        }
    </style>
<body>
   <!-- Further code here -->
<center>
    <div class="login">
        <form action="loginconnect.php" method="post">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="text" name="nama" placeholder="Username" autocomplete="off">
            <input type="password" name="pasword" placeholder="Password">
            <button name="submit">Login</button>
        </form>
    </div>
</center>
</body>

</html>