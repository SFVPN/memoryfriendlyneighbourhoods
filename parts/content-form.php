


<div class="container">
    <?php

    if(is_user_logged_in() || current_user_can('editor'))  {

    the_content();

    acf_form(array(
      'post_id'		=> 'new_post',
      'post_content' => true,
      'post_title' => true,
      'fields' => array(field_5dadde0971dab, field_5daddc49010b7,field_5daf03621ebf0, field_5dade67da6945, field_5dade6a4a6946),
      'new_post'		=> array(
        'post_type'		=> 'programmes',
        'post_status'		=> 'publish'),
      'return'		=> '%post_url%',
      'submit_value'		=> __("Submit Content", 'acf'),
    ));

} else {
  echo "You must be logged in to submit content.";
}

    ?>
</div>
