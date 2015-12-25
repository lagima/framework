<?php $this->layout($gs_template, $ga_templatedata) ?>

<section class="content-header">
	<h1>
		Controllers
		<small>preview of simple tables</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Tables</a></li>
		<li class="active">Simple</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Responsive Hover Table</h3>
					<div class="box-tools">
						<div class="input-group" style="width: 150px;">
							<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Label</th>
								<th>Name</th>
								<th style="width:100px;">&nbsp;</th>
							</tr>
							<?php foreach($la_controllers as $lo_controller): ?>
								<tr>
									<td><?= $lo_controller->label ?></td>
									<td><?= $lo_controller->name ?></td>
									<td>
										<a href="/admin/controller/edit/<?= $lo_controller->pageid ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
</section>