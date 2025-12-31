<!DOCTYPE html>
<html>
<head>
<title>Electricity Bill Calculator</title>

<style>
    body{
        margin: 0;
        padding: 40px 0;
        display: flex;
        justify-content: center;
    }
    .container{
        width: 450px;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h2{
        text-align: center;
        color:#222;
    }
    label{
        font-weight: bold;
        margin-top: 15px;
        display: block;
    }
    input[type="text"]{
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
        font-size: 15px;
    }

    .error{
        color: red;
        font-size: 14px;
    }

    input[type="submit"]{
        width: 100%;
        padding: 12px;
        background:#007bff;
        border:none;
        color:white;
        font-size: 17px;
        border-radius: 5px;
        cursor:pointer;
        margin-top: 20px;
    }

    input[type="submit"]:hover{
        background:#0056b3;
    }

    .output-box{
        margin-top: 25px;
        background:#fafafa;
        border:1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        font-size: 16px;
    }
</style>

</head>

<body>

<div class="container">

<h2>Electricity Bill Calculator</h2>

<?php
$name = $number = $units = "";
$bill = 0;
$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["name"])) {
        $errors["name"] = "Enter consumer name";
    } else { $name = $_POST["name"]; }

    if(empty($_POST["number"])) {
        $errors["number"] = "Enter consumer number";
    } else { $number = $_POST["number"]; }

    if(empty($_POST["units"])) {
        $errors["units"] = "Enter units used";
    } else { $units = $_POST["units"]; }

    if(empty($errors)) {
        if ($units <= 100) {
            $bill = $units * 5;
        } elseif ($units <= 200) {
            $bill = (100 * 5) + (($units - 100) * 7.5);
        } else {
            $bill = (100 * 5) + (100 * 7.5) + (($units - 200) * 10);
        }
    }
}
?>

<form method="post">

<label>Consumer Name:</label>
<input type="text" name="name" value="<?php echo $name; ?>">
<span class="error"><?php echo $errors["name"] ?? ""; ?></span>

<label>Consumer Number:</label>
<input type="text" name="number" value="<?php echo $number; ?>">
<span class="error"><?php echo $errors["number"] ?? ""; ?></span>

<label>Units Used:</label>
<input type="text" name="units" value="<?php echo $units; ?>">
<span class="error"><?php echo $errors["units"] ?? ""; ?></span>

<input type="submit" value="Calculate Bill">

</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
    echo "<div class='output-box'>";
    echo "<h3>Bill Details</h3>";
    echo "Consumer Name: $name <br>";
    echo "Consumer Number: $number <br>";
    echo "Units Used: $units <br>";
    echo "<strong>Total Bill Amount: Rs. $bill</strong>";
    echo "</div>";
}
?>

</div>

</body>
</html>
