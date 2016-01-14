<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class HtmlExtension extends Core implements ExtensionInterface {

	public $engine;
	public $template;
	protected $helper;


	public function register(Engine $po_engine) {

		$this->engine = $po_engine;

		$po_engine->registerFunction('htmlinput', [$this, 'htmlinput']);
		$po_engine->registerFunction('postvalue', [$this, 'postvalue']);
		$po_engine->registerFunction('getvalue', [$this, 'getvalue']);
		$po_engine->registerFunction('debug', [$this, 'debug']);
		$po_engine->registerFunction('getflashmessage', [$this, 'getflashmessage']);
	}

	public function htmlinput($ps_type, $ps_name = null, $ps_label = null, $ps_defaultvalue = null, $pm_value = null) {

		$ps_value = $this->postvalue('__'.$ps_name);
		$ps_value = empty($ps_value) ? $this->getvalue('__'.$ps_name) : $ps_value;
		$ps_value = empty($ps_value) ? $ps_defaultvalue : $ps_value;

		switch($ps_type) {

			case 'text':

				return '<div class="form-group">
							<label for="' . $ps_name . '">' . $ps_label . '</label>
							<input type="text" class="form-control" id="__' . $ps_name . '" name="__' . $ps_name . '" value="' . $ps_value . '" placeholder="' . $ps_label . '">
						</div>';

			break;

			case 'textarea':

				return '<div class="form-group">
							<label for="' . $ps_name . '">' . $ps_label . '</label>
							<textarea class="form-control" id="__' . $ps_name . '" name="__' . $ps_name . '" placeholder="' . $ps_label . '">' . $ps_value . '</textarea>
						</div>';

			break;

			case 'hidden':

				return '<div class="form-group hidden">
							<input type="hidden" class="form-control" id="__' . $ps_name . '" name="__' . $ps_name . '" value="' . $ps_value . '">
						</div>';

			break;

			case 'email':

				return '<div class="form-group">
							<label for="' . $ps_name . '" class="col-sm-2 control-label">' . $ps_label . '</label>
							<div class="col-md-6 col-sm-10">
								<input type="email" class="form-control" id="__' . $ps_name . '" name="__' . $ps_name . '" value="' . $ps_value . '" placeholder="' . $ps_label . '">
							</div>
						</div>';

			break;

			case 'textarea':

				return '<div class="form-group">
							<label for="' . $ps_name . '" class="col-sm-2 control-label">' . $ps_label . '</label>
							<div class="col-md-8 col-sm-6">
								<textarea class="form-control" rows="' . $pm_value . '" id="__' . $ps_name . '" name="__' . $ps_name . '">' . $ps_value . '</textarea>
							</div>
						</div>';

			break;

			case 'checkbox':

				$ls_checked = !empty($ps_value) ? 'checked' : '';
				$ls_value = empty($pm_value) ? '0' : htmlentities($pm_value);

				return '<div class="checkbox">
							<label>
								<input type="hidden" id="__' . $ps_name . '" name="__' . $ps_name . '" value="'. $ls_value . '">
								<input type="checkbox" onclick="$(this).prev().val(this.checked? 1: 0);" ' . $ls_checked . '> ' . $ps_label . '
							</label>
						</div>';


			break;

			case 'select':

				$la_options[] = '<option value="">Choose..</option>';

				$pm_value = is_array($pm_value) ? $pm_value : array();

				foreach($pm_value as $lo_value){

					if(empty($lo_value->id) && empty($lo_value->name))
						continue;

					$ls_selected = $ps_value == $lo_value->id ? 'selected' : '';

					$la_options[] = '<option value="' . $lo_value->id . '" ' . $ls_selected . '>' . htmlentities($lo_value->label) . '</option>';
				}

				return '<div class="form-group">
							<label for="' . $ps_name . '">' . $ps_label . '</label>
							<select class="form-control" id="__' . $ps_name . '" name="__' . $ps_name . '">
								'. implode(PHP_EOL, $la_options) .'
							</select>
						</div>';

			break;

			case 'submit':

				return '<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>';

			break;
		}
	}


	public function setformerror($ps_message) {

		if(!empty($ps_message))
			$this->formerrors[] = $ps_message;
	}

	public function getformerror() {

		if(!$this->hasformerror())
			return false;

		$ls_content = '<p class="alert alert-danger" role="alert">'. implode("<br/>", $this->formerrors) .'</p>';

		return $ls_content;
	}


	public function hasformerror() {

		return !empty($this->formerrors);

	}

	public function geticon($ps_icon, $pb_inverse = false) {

		$ls_style = $pb_inverse ? 'color:white;' : '';

		return '<span class="glyphicon glyphicon-'. $ps_icon . '" aria-hidden="true" style="'. $ls_style .'"></span>';
	}
}