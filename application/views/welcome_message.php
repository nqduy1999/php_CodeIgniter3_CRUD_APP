<?php include_once('header.php'); ?>
<div class="container-fluid">
	<div class="nav-header"><a class="navbar-brand">Code Igniter 3 CRUD with Bootstrap</a></div>
</div>
</nav>
<div class="container p-3 pt-5">
	<h3>Danh sách tất cả các sách</h3>
	<?php if($msg = $this -> session-> flashdata('msg')) :?>
		<?php echo $msg; ?>
	<?php endif;?>
	<?php echo anchor('welcome/create', 'Thêm sách', ['class' => 'btn btn-primary']);?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Tên sách</th>
				<th scope="col">Ngày xuất bản</th>
				<th scope="col">ACtion</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($books)) :?>
				<?php foreach ($books as $books):?>
					<tr class="table-warning">
						<th scope="row"><?php echo $books->id?></th>
						<td><?php echo $books->title?></td>
						<td><?php echo $books->date_created?></td>
						<td>
							<?php echo anchor("welcome/view/{$books ->id}", 'Xem', ['class' => 'btn btn-primary']);?>
							<?php echo anchor("welcome/delete/{$books ->id}", 'Xoá', ['class' => 'btn btn-danger']);?>
							<?php echo anchor("welcome/update/{$books ->id}", 'Update', ['class' => 'btn btn-success']);?>
						</td>
					</tr>
				<?php endforeach;?>
				<?php else: ?>
					<tr>
						<td>Danh sach rong </td>
					</tr>
				<?php endif;?>
			</tbody>
		</table>
	</div>
	<?php include_once('footer.php'); ?>