<?php $this->layout($gs_template, $ga_templatedata) ?>

<section class="content-header">
	<h1>
		<?= $ls_pagetitle ?> <small>preview of simple tables</small>
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
			<a href="<?= $ls_addurl ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-square"></i> &nbsp;Add Page</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-body no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Label</th>
								<th>Name</th>
								<th>Module</th>
								<th>Template</th>
								<th style="width:50px;">&nbsp;</th>
							</tr>
							<?php foreach($la_pages as $lo_page): ?>
								<tr>
									<td><?= $lo_page->label ?></td>
									<td><?= $lo_page->name ?></td>
									<td><?= $lo_page->module ?></td>
									<td><?= $lo_page->template ?></td>
									<td>
										<a href="<?= $ls_editurl ?>/<?= $lo_page->pageid ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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