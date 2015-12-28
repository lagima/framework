<?php $this->layout($gs_template, $ga_templatedata) ?>

<section class="content-header">
	<h1>
		Routes <small>preview of simple tables</small>
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
					<h3 class="box-title">Edit Route</h3>
				</div><!-- /.box-header -->

				<form role="form" method="POST" action="/admin/route/edit/<?= $po_route->routeid ?>">
					<div class="box-body">

						<?= $this->htmlinput('text', 'requesturi', 'Request URI', $po_route->requesturi); ?>
						<?= $this->htmlinput('select', 'moduleid', 'Module', $po_route->moduleid, $pa_modules); ?>
						<?= $this->htmlinput('select', 'pageid', 'Controller', $po_route->pageid, $pa_controllers); ?>
						<?= $this->htmlinput('text', 'action', 'Action', $po_route->action); ?>
						<?= $this->htmlinput('text', 'method', 'Method', $po_route->method); ?>
						<?= $this->htmlinput('checkbox', 'core', 'Is Core ?', $po_route->core); ?>

					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>