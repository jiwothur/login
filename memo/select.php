<?php
$conn = mysqli_connect('localhost','root','111111','opentutorials');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result)){
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
  echo $row['created'];
}
