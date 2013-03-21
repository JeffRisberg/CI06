<?php if($comments): foreach($comments as $row):?>
<div class="commentor">
    <div>
    	<strong><?php echo $row->title;?></strong> says on 
			<span style="font-size:10px;">
			  <?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($row->comment_date));?>
			</span>
    </div>
    <div><?php echo $row->body;?></div>
</div>
<?php endforeach; else: ?>
  <h3>No comments yet!</h3>
<?php endif;?>