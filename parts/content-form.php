<?php

$post_id = get_field('redirect_page', 'option');
$redirect = get_post($post_id);
$redirect_slug = $redirect->post_name;

acf_form(array(
  'post_id'		=> 'new_post',
  'post_content' => true,
  'post_title' => true,
  'new_post'		=> array(
    'post_type'		=> 'resources',
    'post_status'		=> 'draft'),
  'return'		=> home_url($redirect_slug),
  'submit_value'		=> __("Add Resource", 'acf'),
));
?>
