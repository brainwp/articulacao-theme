<?php
/**
 * Displays the content and meta information for a post object.
 *
 * @package P2
 */
?>
<li id="prologue-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	/*
	 * Post meta
	 */

	if ( ! is_page() ):
		$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
		$posts_by_title   = sprintf(
			__( 'Posts by %1$s ( @%2$s )', 'articulacao' ),
			get_the_author_meta( 'display_name' ),
			get_the_author_meta( 'user_nicename' )
		); ?>

		<a href="<?php echo esc_attr( $author_posts_url ); ?>" title="<?php echo esc_attr( $posts_by_title ); ?>" class="post-avatar">
			<?php echo get_avatar( get_the_author_meta('user_email'), 48 ); ?>
		</a>
	<?php endif; ?>
	<h4>
		<?php if ( ! is_page() ): ?>
			<a href="<?php echo esc_attr( $author_posts_url ); ?>" title="<?php echo esc_attr( $posts_by_title ); ?>"><?php the_author(); ?></a>
		<?php endif; ?>
		<span class="meta">
			<?php
			if ( ! is_page() ) {
				echo p2_date_time_with_microformat();
			} ?>
			<span class="actions">
				<a href="<?php the_permalink(); ?>" class="thepermalink<?php if ( is_singular() ) { ?> printer-only<?php } ?>" title="<?php esc_attr_e( 'Permalink', 'p2' ); ?>"><?php _e( 'Permalink', 'p2' ); ?></a>
				<?php
				if ( ! is_singular() )
					$before_reply_link = ' | ';

				if ( comments_open() && ! post_password_required() ) {
						echo post_reply_link( array(
							'before'        => isset( $before_reply_link ) ? $before_reply_link : '',
							'after'         => '',
							'reply_text'    => __( 'Reply', 'articulacao' ),
							'add_below'     => 'comments'
						), get_the_ID() );
				}

				if ( current_user_can( 'edit_post', get_the_ID() ) ) : ?> | <a href="<?php echo ( get_edit_post_link( get_the_ID() ) ); ?>" class="edit-post-link" rel="<?php the_ID(); ?>" title="<?php esc_attr_e( 'Edit', 'p2' ); ?>"><?php _e( 'Edit', 'p2' ); ?></a>
				<?php endif; ?>

				<?php do_action( 'p2_action_links' ); ?>
			</span>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : ?>
				<span class="tags">
					<?php tags_with_count( '', __( '<br />Tags:' , 'articulacao' ) .' ', ', ', ' &nbsp;' ); ?>&nbsp;
				</span>
			<?php endif; ?>
		</span>
	</h4>

	<?php
	/*
	 * Content
	 */
	?>

	<div id="content-<?php the_ID(); ?>" class="postcontent">
	<?php
		p2_title();
		the_content( __( '(More ...)' , 'articulacao' ) );
	?>
	<?php if( have_rows('imagem_field') ):?>

 		<?php // loop through the rows of data
    	while ( have_rows('imagem_field') ) : the_row(); ?>
    		<?php $image_attributes = wp_get_attachment_image_src( get_sub_field( 'the_img' ), 'full' ); ?>
			<a href="<?php echo $image_attributes[0];?>">
				<?php echo wp_get_attachment_image( get_sub_field( 'the_img' ), 'medium' );?>
			</a>

    	<?php endwhile; ?>
	<?php endif;?>

	</div>

	<?php
	/*
	 * Comments
	 */

	$comment_field = '<div class="form"><textarea id="comment" class="expand50-100" name="comment" cols="45" rows="3"></textarea></div> <label class="post-error" for="comment" id="commenttext_error"></label>';

	$comment_notes_before = '<p class="comment-notes">' . ( get_option( 'require_name_email' ) ? sprintf( ' ' . __( 'Required fields are marked %s', 'articulacao' ), '<span class="required">*</span>' ) : '' ) . '</p>';

	$p2_comment_args = array(
		'title_reply'           => __( 'Reply', 'articulacao' ),
		'comment_field'         => $comment_field,
		'comment_notes_before'  => $comment_notes_before,
		'comment_notes_after'   => '<span class="progress spinner-comment-new"></span>',
		'label_submit'          => __( 'Reply', 'articulacao' ),
		'id_submit'             => 'comment-submit',
	);

	?>

	<?php if ( get_comments_number() > 0 && ! post_password_required() ) : ?>
		<div class="discussion" style="display: none">
			<p>
				<?php p2_discussion_links(); ?>
				<a href="#" class="show-comments"><?php _e( 'Toggle Comments', 'articulacao' ); ?></a>
			</p>
		</div>
	<?php endif;

	wp_link_pages( array( 'before' => '<p class="page-nav">' . __( 'Pages:', 'articulacao' ) ) ); ?>

	<div class="bottom-of-entry">&nbsp;</div>

	<?php if ( p2_is_ajax_request() ) : ?>
		<ul id="comments-<?php the_ID(); ?>" class="commentlist inlinecomments"></ul>
	<?php else :
		comments_template();
		$pc = 0;
		if ( p2_show_comment_form() && $pc == 0 && ! post_password_required() ) :
			$pc++; ?>
			<div class="respond-wrap" <?php echo ( ! is_singular() ) ? 'style="display: none; "' : ''; ?>>
				<?php comment_form( $p2_comment_args ); ?>
			</div><?php
		endif;
	endif; ?>
</li>
