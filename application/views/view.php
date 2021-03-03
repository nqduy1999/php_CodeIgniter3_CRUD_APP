<?php include_once('header.php'); ?>
<div class="container">
	<h3>Chi tiết sách  </h3>
	<h4>Tên Sách : <?php echo $books ->title;?></h4>
	<h5>Nội Dung : <?php echo $books ->content;?> </h5>
	<h6>Ngày  : <?php echo $books ->date_created;?> </h6>
</div>
<?php include_once('footer.php'); ?>
