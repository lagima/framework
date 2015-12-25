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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Horizontal Form</h3>
				</div><!-- /.box-header -->

				<form role="form" method="POST" action="/admin/controller/save/<?= $po_controller->pageid ?>">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Label</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?= $po_controller->label ?>">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Name</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?= $po_controller->name ?>">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox"> Is Core ?
							</label>
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>