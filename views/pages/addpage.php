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
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Add Page</h3>
				</div><!-- /.box-header -->

				<form role="form" method="POST" action="<?= $ls_actionurl ?>">
					<div class="box-body">

						<?= $this->htmlinput('text', 'label', 'Label'); ?>
						<?= $this->htmlinput('text', 'name', 'Name'); ?>
						<?= $this->htmlinput('select', 'moduleid', 'Module', null, $pa_modules); ?>
						<?= $this->htmlinput('checkbox', 'core', 'Is Core ?'); ?>

					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>