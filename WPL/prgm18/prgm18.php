<!DOCTYPE html>
<html>
<head>
    <title>Program 18</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 350px;
            margin: 15px auto;
            padding: 15px;
            border: 1px solid #ccc;
            background: white;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-top: 3px;
            border: 1px solid #aaa;
            border-radius: 3px;
        }

        input[type="submit"] {
            margin-top: 12px;
            padding: 8px 15px;
            border: none;
            background: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #eee;
        }

    </style>
</head>

<body>

    <h1>Book Details Form</h1>

    <form method="post" action="prgm18.php">
        <label>Book Id</label>
        <input type="number" name="bid">

        <label>Book Title</label>
        <input type="text" name="title">

        <label>Book Author</label>
        <input type="text" name="author">

        <label>Book Edition</label>
        <input type="text" name="edition">

        <label>Book Publisher</label>
        <input type="text" name="publisher">

        <input type="submit" name="submit" value="Insert">
    </form>

    <form method="post" action="prgm18.php">
        <label>Search by Author</label>
        <input type="text" name="author">

        <input type="submit" name="search" value="Search">
    </form>


<?php
$conn = mysqli_connect("localhost","root","","mits");
if(!$conn){
    echo "Connection Error : ". mysqli_connect_error();
} else {
    echo "<p style='text-align:center;color:green;'>Database Connected Successfully</p>";
}

if(isset($_POST['submit'])){
    $bid = $_POST['bid'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO book VALUES('$bid','$title','$author','$edition','$publisher')";
    if(mysqli_query($conn,$sql)){
        echo "<p style='text-align:center;color:blue;'>Inserted Successfully</p>";
    } else {
        echo "ERROR: " . mysqli_error($conn);
    }
}

if(isset($_POST['search'])){
    $author = $_POST['author'];

    $sql = "SELECT * FROM book WHERE b_author = '$author'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        echo "<table>
                <tr>
                    <th>BOOK ID</th>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
                    <th>EDITION</th>
                    <th>PUBLISHER</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>".$row['b_id']."</td>
                    <td>".$row['b_title']."</td>
                    <td>".$row['b_author']."</td>
                    <td>".$row['b_edition']."</td>
                    <td>".$row['b_publisher']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;color:red;'>No Record Found</p>";
    }
}
mysqli_close($conn);
?>

</body>
</html>
