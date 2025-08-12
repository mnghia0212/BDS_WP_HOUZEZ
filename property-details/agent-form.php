<?php
global $post, $current_user, $ele_settings;
$return_array = houzez20_property_contact_form();
if(empty($return_array)) {
	return;
}

$agent_info = isset($ele_settings['agent_detail']) ? $ele_settings['agent_detail'] : 'yes';

$terms_page_id = houzez_option('terms_condition');
$terms_page_id = apply_filters( 'wpml_object_id', $terms_page_id, 'page', true );
$hide_form_fields = houzez_option('hide_prop_contact_form_fields');
$gdpr_checkbox = houzez_option('gdpr_hide_checkbox', 1);
$agent_display = houzez_get_listing_data('agent_display_option');
$property_id = houzez_get_listing_data('property_id');

$agent_number = $return_array['agent_mobile'];
$agent_whatsapp_call = $return_array['agent_whatsapp_call'];
$agent_mobile_call = $return_array['agent_mobile_call'];
if( empty($agent_number) ) {
	$agent_number = $return_array['agent_phone'];
	$agent_mobile_call = $return_array['agent_phone_call'];
}

$user_name = $user_email = '';
if(!houzez_is_admin()) {
	$user_name =  $current_user->display_name;
	$user_email =  $current_user->user_email;
}

$send_btn_class = 'btn-half-width';
if($return_array['is_single_agent'] == false || empty($agent_number) || wp_is_mobile() ) {
	$send_btn_class = 'btn-full-width';
}

$action_class = "houzez-send-message";
$login_class = '';
$dataModel = '';
if( !is_user_logged_in() ) {
	$action_class = '';
	$login_class = 'msg-login-required';
	$dataModel = 'data-toggle="modal" data-target="#login-register-form"';
}

$agent_email = is_email( $return_array['agent_email'] );

$agent_mobile_num = houzez_option('agent_mobile_num', 1 ); 
$agent_whatsapp_num = houzez_option('agent_whatsapp_num', 1);

$whatsappBtnClass = "hz-btn-whatsapp btn-full-width mt-10";
$messageBtnClass = "btn-full-width mt-10";

if( $agent_mobile_num != 1 && !wp_is_mobile() ) {
	$whatsappBtnClass = "hz-btn-whatsapp btn-half-width";
}
if( $agent_mobile_num != 1 && $agent_whatsapp_num != 1 && !wp_is_mobile() ) {
	$messageBtnClass = "btn-half-width";
}

if ($agent_email && $agent_display != 'none') {
?>

<?php } ?>