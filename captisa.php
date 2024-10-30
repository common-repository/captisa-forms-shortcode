<?php
/*
Plugin Name: Captisa Forms Shortcode Plugin
Description: Shortcode to embed Captisa Forms seamlessly. <code>[captisa id="c11d2a2c-1ea7-40bb-b39d-9841fa0b8d7d" header="true" prefill="true"]</code>
Version: 1.1
License: GPL
Author: Captisa Forms
Author URI: https://captisa.com
Text Domain: captisa-shortcode
*/

function embedCaptisaForms($atts, $content = null) {
	$p = shortcode_atts(array(
		'id'   => '',
		'header' => false,
		'prefill' => false
	), $atts);

	if ($p['id'] == '') {

		return "<div style='border: 1px solid #d4d4d4; padding: 10px; margin: 30px;'>
			<p style='margin: 0;'>Captisa Forms shortcode is incorrect.</p>
		</div>";

	} else {

		$script = "<section class='captisa-form'>";
		$script .= "<div class='captisa-body'>";
		$script .= "<script id='captisaEmbed' src='https://secure.captisa.com/scripts/cora.embed.js'></script>";
		$script .= "<script type='text/javascript'>";
		$script .= "cora.widget.load(" . $p['header'] . "," . $p['prefill'] . ");";
		$script .= "</script>";
		$script .= "<script src='https://secure.captisa.com/p/widget/" . $p['id'] . "'></script>";
		$script .= "</div>\n";
		$script .= "</section>\n";
		return "$script";

	}
}

add_shortcode('captisa', 'embedCaptisaForms');

?>
