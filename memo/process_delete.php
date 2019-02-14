<?php
$conn = mysqli_connect('localhost','root','111111','opentutorials');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn,$_POST['id']),
);
$sql = "
  DELETE FROM topic
    WHERE id = {$filtered['id']}
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
