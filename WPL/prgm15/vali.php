<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
    <style>
        body {
            background: #eef2f3;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 380px;
            margin: 60px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.15);
        }
        h3 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #34495e;
        }
        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 6px 0 14px 0;
            border: 1px solid #bfbfbf;
            border-radius: 5px;
            font-size: 15px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .error {
            color: #e74c3c;
            margin: 10px 0;
            font-size: 14px;
            background: #fdecea;
            padding: 8px;
            border-radius: 5px;
        }
        .success {
            color: #27ae60;
            font-size: 15px;
            margin: 15px 0;
            padding: 8px;
            background: #e7f7ec;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Form Validation</h3>
    <form method="post" action="">
        <label>Name :</label><br>
        <input type="text" name="name"><br>
        <label>Email :</label><br>
        <input type="text" name="email"><br>
        <label>Phone :</label><br>
        <input type="text" name="phno"><br>

        <label>Password :</label><br>
        <input type="text" name="password"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? "";
            $email = $_POST['email'] ?? "";
            $phno = $_POST['phno'] ?? "";
            $password = $_POST['password'] ?? "";

            if (empty($name)) {
                echo "<div class='error'>Name field cannot be empty!</div>";
            }
            else if (empty($email)) {
                echo "<div class='error'>Email field cannot be empty!</div>";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='error'>Invalid email format (Use: example@domain.com)</div>";
            }
            else if (empty($phno)) {
                echo "<div class='error'>Phone number cannot be empty!</div>";
            }
            else if (!ctype_digit($phno) || strlen($phno) != 10) {
                echo "<div class='error'>Phone number must be exactly 10 digits!</div>";
            }
            else if (empty($password)) {
                echo "<div class='error'>Password cannot be empty!</div>";
            }
            else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
                echo "<div class='error'>Password must have 8+ chars, 1 uppercase, 1 lowercase, 1 number.</div>";
            }
            else {
                echo "<div class='success'><b>Form Submitted Successfully!</b></div>";
                echo "<div class='success'>
                        Name: $name <br>
                        Email: $email <br>
                        Phone: $phno <br>
                      </div>";
            }
        }
    ?>
</div>
</body>
</html> 
