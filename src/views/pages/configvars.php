<?php $this->layout($gs_template, $ga_templatedata) ?>

<section class="content-header">
	<h1>
		Config Variables <small>preview of simple tables</small>
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
			<a href="/admin/configvar/add" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-square"></i> &nbsp;Add Variable</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-body no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Key</th>
								<th>Value</th>
								<th style="width:100px;">&nbsp;</th>
							</tr>
							<?php foreach($la_configvars as $la_config): ?>
								<tr>
									<td><?= $la_config['key'] ?></td>
									<td><?= htmlentities($la_config['value']) ?></td>
									<td>
										<a href="/admin/configvar/edit/<?= $la_config['configid'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
										<?php if(!$la_config['admin']): ?>
											<a href="/admin/configvar/delete/<?= $la_config['configid'] ?>" class="btn btn-danger btn-xs" onclick="return jsconfirm();"><i class="fa fa-trash"></i></a>
										<?php endif; ?>
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