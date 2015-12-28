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
					<h3 class="box-title">Edit Page</h3>
				</div><!-- /.box-header -->

				<form role="form" method="POST" action="<?= $ls_actionurl ?>">
					<div class="box-body">
						<?= $this->htmlinput('text', 'label', 'Label', $lo_page->label); ?>
						<?= $this->htmlinput('text', 'name', 'Name', $lo_page->name); ?>
						<?= $this->htmlinput('select', 'moduleid', 'Module', $lo_page->moduleid, $pa_modules); ?>
						<?= $this->htmlinput('select', 'controllerid', 'Controller', $lo_page->controllerid, $pa_controllers); ?>
						<?= $this->htmlinput('checkbox', 'core', 'Is Core ?', $lo_page->core); ?>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>