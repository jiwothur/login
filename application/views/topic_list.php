<div class="col-sm-2">
  <ul>
    <?php
  foreach($topics as $entry){
     ?>
     <li><a href="/index.php/topic/get/<?=$entry->id?>"><?=$entry->title?></a></li>
     <?php
   }
      ?>
  </ul>
</div>
