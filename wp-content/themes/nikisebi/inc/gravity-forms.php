<?php
function gf_make_submit_input_into_a_button_element($button_input, $form) {

	//save attribute string to $button_match[1]
	// preg_match("/<input([^\/>]*)(\s\/)*>/", $button_input, $button_match);
	// $button_atts = str_replace("value='".$form['button']['text']."' ", "", $button_match[1]);
	// $button_atts = str_replace( "gform_button button", "x-btn x-btn-global", $button_atts );

	return '<div class="hidden">'.$button_input.'</div><a href="#" class="trigger-submit x-btn x-btn-global">'.$form['button']['text'].'</a>';
	// $atts = array(
	// 	'href' => null,
	// 	'content' => $form['button']['text'],
	// 	'id' => 'gform_submit_button_'.$form['id'],
	// );
	// $x_btn = CS_Button::render($atts);
	// return $button_input.$x_btn;

}
add_filter('gform_submit_button', 'gf_make_submit_input_into_a_button_element', 10, 2);

?>