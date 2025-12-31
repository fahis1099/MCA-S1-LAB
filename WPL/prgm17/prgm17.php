<!DOCTYPE html>
<html>
<head>
    <title>Program 17</title>

    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            background: white;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .msg {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h1>Student Data Retrieval</h1>

<?php
$conn = mysqli_connect("localhost","root","","mits");
if(!$conn){
    echo "<p class='msg' style='color:red;'>Connection Error: " . mysqli_connect_error() . "</p>";
}
else{
    echo "<p class='msg'>Database Connection Successful</p>";
}

$sql = "SELECT * FROM student";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    echo "<table>
            <tr>
                <th>ROLL NO</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>DEPARTMENT</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>".$row['roll_no']."</td>
                <td>".$row['s_name']."</td>
                <td>".$row['s_age']."</td>
                <td>".$row['s_dpt']."</td>
              </tr>";
    }
    echo "</table>";
}
else{
    echo "<p class='msg' style='color:red;'>No Record Found</p>";
}

mysqli_close($conn);
?>

</body>
</html>
