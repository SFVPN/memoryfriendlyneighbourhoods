<div id="forum-container" class="col s12">
    <?php
$user = wp_get_current_user();


//    if(current_user_can('administrator') || ($user->roles[0] == 'um_cdn-member')) {

    ?>

      <div id="comment-wrapper" >

          <?php	comments_template();?>

      </div>

  <?php

//} else {
//  _e( '<p class="center">You must be a member of the Critical Dementia Network and logged in to view or add comments on blog posts.</p>', 'mfn' );
//}

    ?>
</div>
