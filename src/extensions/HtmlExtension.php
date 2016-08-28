<?
namespace Mercury\Extension;

use Mercury\Helper\Core;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class HtmlExtension extends Core implements ExtensionInterface {

	public $engine;

	// function __construct() {
	// 	// This doesnt have to do all the shit the core class does
	// }

	public function register(Engine $po_engine) {

		$this->engine = $po_engine;

		$po_engine->registerFunction('styleselector', [$this, 'styleselector']);
		$po_engine->registerFunction('htmlinput', [$this, 'htmlinput']);
		$po_engine->registerFunction('postvalue', [$this, 'postvalue']);
		$po_engine->registerFunction('getvalue', [$this, 'getvalue']);
		$po_engine->registerFunction('debug', [$this, 'debug']);
		$po_engine->registerFunction('getflashmessage', [$this, 'getflashmessage']);

		$po_engine->registerFunction('setformerror', [$this, 'setformerror']);
		$po_engine->registerFunction('validatefield', [$this, 'validatefield']);
		$po_engine->registerFunction('getfielderror', [$this, 'getfielderror']);
	}

	public function styleselector($ps_current, $ps_actual, $ps_style = 'active') {

		if(empty($ps_current) && empty($ps_actual))
			return false;

		if(strcasecmp($ps_actual, $ps_current) == 0)
			return $ps_style;

		return false;
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

			case 'readonly':

				return '<div class="form-group">
							<label for="' . $ps_name . '">' . $ps_label . '</label>
							<input type="text" class="form-control" id="__' . $ps_name . '" name="__' . $ps_name . '" value="' . $ps_value . '" placeholder="' . $ps_label . '" readonly>
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


	/**
	 * Add the error log to error array and formerror
	 * Used to show validation errors
	 * @param  string $ps_error Error string
	 * @return boolean
	 */
	public function setformerror($ps_error, $ps_field){

		if(empty($ps_error))
			return false;

		if(empty($ps_field))
			return false;

		// $this->seterrorlog($ps_error);

		$this->formerrors[$ps_field] = $ps_error;

		return true;
	}


	/**
	 * Returns the accumulated formerrors
	 * @return array
	 */
	public function getformerrors(){
		return $this->formerrors;
	}


	public function hasformerror() {
		return !empty($this->formerrors);
	}


	/**
	 * Validate the field for any errors we set using setformerror()
	 * If we find the field entry in the error array we will return the class name
	 * which can be used on the field class
	 * @param  string $ps_field
	 * @param  string $ps_class
	 * @return string
	 */
	public function validatefield($ps_field, $ps_class = 'j-show') {

		$la_formerrors = $this->getformerrors();

		if(isset($la_formerrors[$ps_field]))
			return $ps_class;

		return;
	}


	/**
	 * Get the field error we set using setformerror()
	 * @param  string $ps_field
	 * @param  string $ps_class
	 * @return string
	 */
	public function getfielderror($ps_field) {

		$la_formerrors = $this->getformerrors();

		if(isset($la_formerrors[$ps_field]))
			return $la_formerrors[$ps_field];

		return;
	}


	public function geticon($ps_icon, $pb_inverse = false) {

		$ls_style = $pb_inverse ? 'color:white;' : '';

		return '<span class="glyphicon glyphicon-'. $ps_icon . '" aria-hidden="true" style="'. $ls_style .'"></span>';
	}
}