<?php
$conn = mysqli_connect('localhost','root','111111','opentutorials');
$filtered = array(
  'title'=>mysqli_real_escape_string($conn,$_POST['title']),
  'description'=>mysqli_real_escape_string($conn,$_POST['description'])

);
$sql = "
INSERT INTO topic
(title,description,created)
  VALUES(
  '{$filtered['title']}',
  '{$filtered['description']}',
  NOW()
  )
  ";
  $result = mysqli_query($conn,$sql);
  if($result === false){
    echo '오류가 발생하였습니다<br>';
    echo '<a href="index.php">BACK</a>';
    error_log(mysqli_error($conn));
  }
  else {
    echo '완료되었습니다<br>';
    echo '<a href="index.php">BACK</a>';
  }
 ?>
