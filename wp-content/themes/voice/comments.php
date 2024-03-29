<?php

if ( post_password_required() ) {
  return;
}

if ( comments_open() ) {
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );

  $comment_form_args = array(
    'comment_notes_after' => '',
    'cancel_reply_link' => __vce( 'cancel_reply_link' ),
    'label_submit'      => __vce( 'comment_submit' ),
    'title_reply' => __vce( 'leave_a_reply' ),
    'must_log_in' => '<p class="must-log-in">' . sprintf( __vce( 'must_log_in' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __vce( 'logged_in_as' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . __vce( 'comment_field' ) .'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .'</textarea></p>'
  );
}
?>
<?php
if ( comments_open() && ( vce_get_option( 'comments_position' ) == true ) ) :

  comment_form( $comment_form_args );

endif;
?>
<?php if ( have_comments() ) : ?>

<div id="comments" class="comments-main">
     <div class="comments-holder main-box">
        <h3 class="comment-title main-box-title"><?php comments_number( __vce( 'no_comments' ), __vce( 'one_comment' ), __vce( 'comments_number' ) ); ?></h3>

      <div class="main-box-inside content-inside">
        <ul class="comment-list">
            <?php $args = array(
  'avatar_size' => 75,
  'reply_text' => __vce( 'reply_comment' ),
  'format' => 'html5'
);?>
            <?php wp_list_comments( $args ); ?>
        </ul><!--END comment-list-->
        </div>
        <?php if ( $vce_paginate_comments = paginate_comments_links( array( 'echo' => false ) ) ): ?>
          <div class="navigation">
             <?php echo wp_kses_post( $vce_paginate_comments ); ?>
          </div>
        <?php endif; ?>
    </div><!--END comments holder -->
</div>
<?php endif; ?>

<?php
if ( comments_open() && ( vce_get_option( 'comments_position' ) == false ) ) :

  comment_form( $comment_form_args );

endif;

?>