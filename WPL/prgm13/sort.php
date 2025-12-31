<html>
<head>
<title>Student Names</title>
<style>
    body{
        background: #f4f4f9;
        margin:0;
        padding:0;
    }
    .container{
        width: 50%;
        margin: 50px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center;
    }
    h1{
        color:#333;
        margin-bottom:20px;
    }
    label{
        font-size:16px;
        color:#444;
    }
    input[type="text"]{
        width: 80%;
        height: 40px;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding-left:10px;
        font-size:15px;
        margin-top:10px;
    }
    button{
        margin-top:20px;
        padding:10px 20px;
        font-size:16px;
        background:#007bff;
        border:none;
        border-radius:5px;
        cursor:pointer;
    }
    button:hover{
        background:#0056b3;
    }
    h2{
        color:#222;
        margin-top:30px;
    }
    .output-box{
        background:#fafafa;
        border: 1px solid #ddd;
        padding:10px;
        border-radius:5px;
        width:80%;
        margin: 10px auto;
        font-size:16px;
    }
</style>
</head>
<body>
<center>
<h1>Student List</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<label>Enter student names in format 'Name:rollNumber' separated by
comma:</label><br><br>
<input type="text" style="width:300px; height:40px;" name="student_names"
required><br><br>
<button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$namesInput = $_POST["student_names"];
$students = explode(",", $namesInput);
$studentNames = [];
// Create array roll => name
foreach ($students as $student) {
list($name, $roll) = explode(":", $student);
$studentNames[trim($roll)] = trim($name);
}
// Function to print array in one line
function print_single_line($arr) {
foreach ($arr as $roll => $name) {
echo "$roll => $name ";
}
}
echo "<h2>Student Names</h2>";
print_single_line($studentNames);

asort($studentNames);
echo "<h2>Ascending Order</h2>";
print_single_line($studentNames);

arsort($studentNames);
echo "<h2>Descending Order</h2>";
print_single_line($studentNames);
}
?>
</center>
</body>
</html>
