<?php

  if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
  }

  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
     ?>

    <div class="container container--narrow page-section">
      <ul class="min-list link-list" id="my-notes"></ul>
        <?php

        $notesQuery = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'note',
          'author' => get_current_user_id()
        ));

        // echo ('<pre>');
        // print_r($notesQuery);
        // echo ('</pre>');
        while($notesQuery->have_posts()) {
          $notesQuery->the_post(); ?>
          <li class="min-list link-list">
            <input class="note-title-field" value="<?php echo esc_attr(get_the_title()); ?>">
            <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i>     Edit</span><span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
            <textarea class="note-body-field"><?php echo esc_attr(get_the_content()); ?></textarea>
          </li>

        <?php }


        ?>
    </div>
  <?php }
  get_footer();
?>
