<?php
acf_form(array(
  'post_id'		=> 'new_post',
  'post_content' => true,
  'post_title' => true,
  'new_post'		=> array(
  'post_type'		=> 'resources',
  'post_status'		=> 'draft'),
  'submit_value'		=> __("Add Resource", 'acf'),
));
?>
