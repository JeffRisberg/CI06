<?php if($posts): foreach($posts as $row):?>
<div class="postData">
    <div><?php echo $row->title;?></div>
    <div><?php echo $row->body;?></div>
</div>
<?php endforeach; else: ?>
  <h3>No posts yet!</h3>
<?php endif;?>