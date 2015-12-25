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

	<div class="row" style="margin-bottom:10px;">
		<div class="col-xs-8">
			<div class="input-group" style="width:250px">
				<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
				<div class="input-group-btn">
					<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<button class="btn btn-success btn-sm pull-right"><i class="fa fa-plus-square"></i> &nbsp;Add Page</button>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Responsive Hover Table</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Request URI</th>
								<th>Action</th>
								<th>Method</th>
								<th style="width:100px;">&nbsp;</th>
							</tr>
							<?php foreach($la_routes as $lo_row): ?>
								<tr>
									<td><?= $lo_row->requesturi ?></td>
									<td><?= $lo_row->action ?></td>
									<td><?= $lo_row->method ?></td>
									<td>
										<a href="/admin/route/edit/<?= $lo_row->pageid ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
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