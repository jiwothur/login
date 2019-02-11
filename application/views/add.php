<form action="/index.php/topic/add" method="post" class="col-sm-2">
  <?php echo validation_errors(); ?>
  <p><input type = "text" name = "title" placeholder="제목" cols="50"></p>
  <p><textarea name = "description" placeholder="본문" cols="50" rows="8"></textarea></p>
  <input type ="submit">
</form>
