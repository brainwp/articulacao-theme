<?php
/**
 * Front-end post form.
 *
 * @package P2
 */
?>
<script type="text/javascript">
/* <![CDATA[ */
	jQuery(document).ready(function($) {
		$('#post_format').val($('#post-types a.selected').attr('id'));
		$('#post-types a').click(function(e) {
			$('.post-input').hide();
			$('#post-types a').removeClass('selected');
			$(this).addClass('selected');
			if ($(this).attr('id') == 'post') {
				$('#posttitle').val("<?php echo esc_js( __('Título do Post', 'articulacao') ); ?>");
			} else {
				$('#posttitle').val('');
			}
			$('#postbox-type-' + $(this).attr('id')).show();
			$('#post_format').val($(this).attr('id'));
			return false;
		});
	});
/* ]]> */
</script>

<?php $post_format = isset( $_GET['p'] ) ? $_GET['p'] : 'status'; ?>
<div id="postbox">

	<div class="postboxcontent">

		<div class="avatar">
			<?php echo get_avatar( get_current_user_id(), 240 ); ?>
		</div>

		<div class="inputarea">
			<?php $acf_before = sprintf('<input type="text" name="the_title" placeholder="%s">', __('Titulo', 'articulacao') );?>
			<?php $acf_before .= '<input type="hidden" name="brasa_add_new" value="true">';?>

			<?php $return = home_url('/?updated=true');?>
			<?php if ( $default_post = get_page_by_title( 'default post', OBJECT, 'post' ) ) : ?>
				<?php acf_form( array( 'new_post' => true, 'post_id' => $default_post->ID, 'post_title' => true, 'post_content' => true, 'html_before_fields' => $acf_before, 'return' => $return, 'submit_value' => __('Enviar novo post', 'articulacao') ) ); ?>
			<?php endif;?>
		</div>

		<div class="clear"></div>

		<div class="postbox-sidebar">
			<?php dynamic_sidebar( 'beneath-post-box' ); ?>
		</div>

	</div><!--/.postboxcontent -->

</div> <!-- // postbox -->
