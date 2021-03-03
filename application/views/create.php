<?php include_once('header.php'); ?>
<div class="container"> 
	<?php echo form_open('welcome/save');?>
	<fieldset>
		<legend>Thêm sách</legend>
		<div class="form-group">
			<label for="textInput" class="form-label">Tên sách</label>
			<div class="col-md-10">
				<?php echo form_input(['name' => 'title', 'placeholder' => 'Nhap ten sach', 'class' => 'form-control', 'id' => 'textInput']);?>
			</div>
			<div class="col-md-10">
				<?php echo form_error('title', '<div class="text-danger">', '</div>');?>
			</div>
		</div>
		<div class="form-group">
			<label for="textArea">Nội dung</label>
			<div class="col-md-10">
				<?php echo form_textarea(['name' => 'content', 'placeholder' => 'Nhap noi dung sach', 'class' => 'form-control', 'id' => 'textArea']);?>
			</div>
			<div class="col-md-10">
				<?php echo form_error('content', '<div class="text-danger">', '</div>');?>
			</div>
		</div>
		<?php echo form_submit(['name' =>'submit', 'value' =>'Submit', 'class' => 'btn btn-primary']); ?>

		<?php echo anchor('welcome', 'Quay lại ds', ['class' => 'btn btn-danger']);?>
	</fieldset>
	<?php echo form_close();?>
</div>
<?php include_once('footer.php'); ?>
