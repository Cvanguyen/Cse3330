<?php 
$servername = "localhost";
$username = "guest";
$password = "guest123";
$dbname = "Library_Catalog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, cover_image, name
        FROM (GENRE JOIN ITEM)
        WHERE GENRE.genre_id = ITEM.genre_id && GENRE.name = 'DRAMA'";
	
$result = $conn->query($sql);
echo "<div><br></div><div>";
if ($result->num_rows > 0){

  while($row = $result->fetch_assoc()){
    echo "<div style=float:left><img src =../" . $row["cover_image"]. " style=\"width:20%\" height:\"20%\">";
    echo "<p><b>" . $row["title"]. "</b><br>" . $row["name"] . "</p><div>";
  
  }
echo "</div>";
}
else {
  echo "<p>0 results.</p>";
}
$conn->close();

?> 





























?>