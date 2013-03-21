<script src="<?php echo base_url();?>assets/js/ckeditor.js"></script>

<?php if (validation_errors()) {
	echo validation_errors('<p class="error">','</p>');
} ?>
      
<?php if ($this->session->flashdata('message')) {
	echo '<p class="success">'.$this->session->flashdata('message').'</p>';
} ?>

<?php echo form_open('idea/save');?>
<p>
	<strong>Title</strong>:<br /> <input type="text" name="title" size="60" />
</p>
<br clear="all" />

<p>
	<strong>Body</strong>: (HTML mode)
</p>
<textarea class="ckeditor" cols="80" id="body" name="body" rows="10">        
</textarea>
<br clear="all" />

<p>
	<input type="submit" value="Submit" />
</p>
<?php echo form_close(); ?>
