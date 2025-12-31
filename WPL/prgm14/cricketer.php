<html>
<head>
<title>Indian Cricket Players</title>
<style>
    body{
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    .container{
        width: 60%;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        text-align: center;
    }

    h2{
        margin-bottom: 20px;
        color: #333;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-size: 16px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background: #007bff;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background: #f2f8ff;
    }

    tr:hover {
        background: #e6f2ff;
        transition: 0.3s;
    }
</style>
</head>
<body>
<?php
$players = array("Rohit Sharma", "Virat Kohli", "Jasprit Bumrah", "Hardik Pandya", "KL
Rahul", "Ravindra Jadeja");
?>

<h2 style="text-align:center;">Indian Cricket Players</h2>
<table>
<tr>
<th>Sl No</th>
<th>Player Name</th>
</tr>

<?php
$i = 1;
foreach ($players as $p) {
echo "<tr>";
echo "<td>$i</td>";
echo "<td>$p</td>";
echo "</tr>";
$i++;
}
?>
</table>
</body>
</html>
