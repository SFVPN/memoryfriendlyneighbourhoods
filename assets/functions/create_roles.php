<?php $roles = get_field('add_roles', 'options');

if( $roles ):

   foreach( $roles as $role):
       $role_name = $role->post_name . '_member';
        $title = get_the_title($role->ID);
        if( get_role($role_name) ){ // let's check if the role selected already exists. If it does, do nothing
          // $message = "The role of " . $role_name . " already exists";
          // echo "<script type='text/javascript'>alert('$message');</script>";

} else { // if the selected role doesn't exist, let's create it with author capabilities.
            $result = add_role(
          $role_name,
          __( $title . ' Member' ),
          array(
            'delete_posts' => true, // Use false to explicitly deny
            'delete__published_posts'   => true,
            'edit_posts' => true, // Use false to explicitly deny
            'edit__published_posts'   => true,
            'publish_posts' => true, // Use false to explicitly deny
            'read'         => true,  // true allows this capability
            'upload_files'   => true,
          )
          );
          echo '<div class="notice is-dismissible updated">';
          echo '<p>The role of ' . $title . ' Member has been created</p>
          <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
       </div>';
}

           endforeach;
 endif;
