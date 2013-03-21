<?php if ($this->session->flashdata('message')) {
	echo '<p class="success">'.$this->session->flashdata('message').'</p>';
} ?>

<?php if ($ideas): foreach($ideas as $idea):?>
<div class="idea">
	<div class="idea meta">
		<div class="title">
			<h2 style="margin-left: 0px">
			  <?php echo anchor('idea/view/' . $idea->id, $idea->title); ?>				
			</h2>
		</div>
		<div class="date">
			<?php date_default_timezone_set('Etc/UTC');
			      $phpdate = strtotime($idea->date_created . " + 1 hour");
			      date_default_timezone_set('America/Los_Angeles');
            echo date('m/d/Y H:i:s', $phpdate); ?>
		</div>
	</div>
	<br clear="all" />
	<p>
		<?php echo $idea->body; ?>
	</p>
	<hr />
</div><!-- Close idea -->
<?php endforeach; else: ?>
  <h3>No ideas yet</h3>
<?php endif; ?>