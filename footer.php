<?php
/**
 * Footer template.
 *
 * @package P2
 */
?>
    <?php if(!is_page_template('register.php' )):?>
		<?php get_sidebar(); ?>
	<?php endif;?>
	<div class="clear"></div>

</div> <!-- // wrapper -->

<div id="footer">
	<p class="credit">
	    <?php printf( __( 'Desenvolvido com %1$s para a %2$s.', 'Houston' ), '<a href="http://br.wordpress.org/" rel="designer">WordPress</a>', '<a href="http://polos.mundialfutebolderua.org/" rel="believer">Rede de Futebol de Rua</a>' ); ?>
	</p>
</div>

<div id="notify"></div>

<div id="help">
	<dl class="directions">
		<dt>c</dt><dd><?php _e( 'Criar Novo Post', 'Houston' ); ?></dd>
		<dt>j</dt><dd><?php _e( 'Próximo Post/Comentário', 'Houston' ); ?></dd>
		<dt>k</dt> <dd><?php _e( 'Post/Comentário Anterior', 'Houston' ); ?></dd>
		<dt>r</dt> <dd><?php _e( 'Responder', 'Houston' ); ?></dd>
		<dt>e</dt> <dd><?php _e( 'Editar', 'Houston' ); ?></dd>
		<dt>o</dt> <dd><?php _e( 'Mostrar/Ocultar comentários', 'Houston' ); ?></dd>
		<dt>t</dt> <dd><?php _e( 'Ir para o topo', 'Houston' ); ?></dd>
		<dt>l</dt> <dd><?php _e( 'Fazer Login', 'Houston' ); ?></dd>
		<dt>h</dt> <dd><?php _e( 'Mostrar/Esconder Ajuda', 'Houston' ); ?></dd>
		<dt><?php _e( 'Shift + Esc', 'Houston' ); ?></dt> <dd><?php _e( 'Cancelar', 'Houston' ); ?></dd>
	</dl>
</div>

<?php wp_footer(); ?>

</body>
</html>
