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
    <h1>MEMO</h1>
  <form action="process_create.php" method="POST">
    <p><input type = "text" name="title" placeholder = "title"</p>
    <p><textarea name = "description" placeholder="description"></textarea></p>
    <p><input type = "submit" value = "create"></p>
  </form>
  </body>
</html>
