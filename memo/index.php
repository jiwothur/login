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
  'title'=>'WELCOME',
  'description'=>NULL,
  'created'=>NULL
);
if(isset($_GET['id'])){
  settype($_GET['id'],'integer');
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "SELECT * FROM topic WHERE id = {$filtered_id}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article['title']=htmlspecialchars($row['title']);
  $article['description']=htmlspecialchars($row['description']);
  $article['created']=htmlspecialchars($row['created']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MEMO</title>
    <style>
    body{
      margin: 0;
    }
    html{
      background-image:url("memo1.jpg");
      background-size: auto ;
    }
    h1{
      font-style: italic;
      text-align : center;
      border-bottom:2px solid black;
      margin:0;
      padding:20px;
      }
    ul{
        text-decoration: none;
        border-right:2px solid black;
        width:100px;
        margin:0;
        padding:20px;
      }
  #grid{
        display:grid;
        grid-template-columns: 150px 1fr;
        border-bottom:2px solid black;
      }

    </style>
  </head>
  <body>
  <h1><a>MEMO SERVICE</a></h1>
    <div id="grid">
      <?=$list?>
    <br>
       <?=$article['description']?>
       <br><br><br><br><br><br>
       <?=$article['created']?>
   </div>
   <br>
    <a href ="create.php">create</a>
    <a href="/index.php/topic">main</a>
    <?php
    if(isset($_GET['id'])){
     ?>
     <a href="update.php?id=<?=$_GET['id']?>">update</a></h1>
     <form action="process_delete.php" method="post" onsubmit="
     if(!confirm('sure?')){
       return false;
     }
     ">
       <input type = "hidden" name ="id" value="<?=$_GET['id']?>">
       <p><input type = "submit" value="delete"></p>
     </form>
    <?php
  }
   ?>
  </body>
</html>
