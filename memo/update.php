<?php
$conn = mysqli_connect('localhost','root','111111','opentutorials');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn,$sql);
$list = '<ul>';
while($row = mysqli_fetch_array($result)){
  $escaped = array(
    'title'=> htmlspecialchars($row['title'])
  );
  $list .= '<li><a href="index.php?id='.$row['id'].'">'.$escaped['title'].'</a></li>';
}
$list .= '</ul>';

$article = array(
  'title'=>'WEB',
  'description'=>'Hello'
);
if(isset($_GET['id'])){
  settype($_GET['id'],'integer');
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "SELECT * FROM topic WHERE id = {$filtered_id}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
    $article['title']=htmlspecialchars($row['title']);
    $article['description']=htmlspecialchars($row['description']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MEMO</title>
    <style>
    html{
  background-image:url("memo1.jpg");
  background-size: 100% ;

    }

    </style>
  </head>
  <body>
    <h1><a href="index.php">MEMO</a></h1>
    <?=$list?>
    <form action="process_update.php" method="post">
      <input type = "hidden" name ="id" value="<?=$_GET['id']?>">
      <p><input type ="text" name="title" placeholder="title"
        value="<?=$article['title']?>"></p>
      <p><textarea name="description"
        placeholder="description"><?=$article['description']?></</textarea></p>
      <p><input type = "submit" value="update"></p>
    </form>
  </body>
</html>
