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
			<form method="GET" action="/admin/gitsearch">
				<div class="input-group" style="width:250px">
					<input type="text" name="q" class="form-control input-sm pull-right" placeholder="Search">
					<div class="input-group-btn">
						<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-xs-4">
			<a href="/admin/controller/add" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-square"></i> &nbsp;Add Page</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-body no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Changed Files</th>
								<th style="width:50px;">&nbsp;</th>
							</tr>

							<?php if(empty($la_changes)): ?>
								<tr>
									<td>All changes are committed</td>
									<td>

									</td>
								</tr>
							<?php endif; ?>

							<?php foreach($la_changes as $ls_file): ?>
								<tr>
									<td><?= $ls_file ?></td>
									<td>

									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
					<form role="form" method="POST" action="/admin/gitcommit">
						<div class="box-body">
							<?= $this->htmlinput('textarea', 'message', 'Commit Message'); ?>
						</div><!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
</section>