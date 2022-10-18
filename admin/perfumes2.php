<!DOCTYPE html>
<html>
<head>
<title>Perfumes</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Price</th>
<th>Brand</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "aroma");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name,gender, price,brand FROM perfumes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["name"]. "</td><td>" . $row["gender"] . "</td><td>". $row["price"]. "</td><td>" . $row["brand"] . "</td><td>";
    
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>