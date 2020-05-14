


<div class="container">
    <?php

    if(is_user_logged_in() || current_user_can('editor'))  {

    the_content();

    acf_form(array(
      'post_id'		=> 'new_post',
      'post_content' => true,
      'post_title' => true,
      'field_group' => '689',
    // 'fields' => array('field_57346973097e8', 'field_5739be88b3e2d','field_59394dca35e71', 'field_59394de135e72', 'field_5936d106c483f', 'field_5936d12bc4840', 'field_59394e1135e73', 'field_59394e3435e74', 'field_594a5669d44ad', 'field_594a5631d44a9'),
      'new_post'		=> array(
        'post_type'		=> 'resources',
        'post_status'		=> 'publish'),
      'return'		=> '%post_url%',
      'html_submit_button'  => '<input type="submit" class="acf-button green darken-2 btn-large" value="%s" />',
      'submit_value'		=> __("Submit Your Resource", 'acf'),
    ));

} else {
  echo 'You must be <a href="https://memoryfriendly.org.uk/login/">logged in</a> to submit content.';
}

    ?>
</div>
