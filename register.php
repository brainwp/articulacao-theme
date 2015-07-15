<?php
/**
 * Template name: Page Register
 *
 */
get_header();
?>
<div class="sleeve_main">
	<div id="main">
		<h2><?php the_title(); ?></h2>

		<ul id="postlist">
			<li class="hentry">
				Já possui conta? Então <a href="<?php echo wp_login_url();?>">faça login</a>!
			</li><!-- .hentry -->
			<li class="hentry">
				<form action="<?php home_url('/registrar');?>" id="form-register" method="POST">
					<label>
						Nome completo:
						<input type="text" name="name" required>
					</label>
					<label>
						Idade:
						<input type="number" name="idade" min="1" required>
					</label>
					<label>
						Polo:
						<input type="text" name="polo" required>
					</label>
					<label>
						Telefone:
						<input type="text" name="fone" required>
					</label>
					<label>
						No projeto você é:
						<select name="user_type" required>
							<option value="Mediador(a)">Mediador(a)</option>
							<option value="Jogador(a)">Jogador(a)</option>
							<option value="Educador(a)">Educador(a)</option>
							<option value="Outros">Outros</option>
						</select>
					</label>
					<label>
						E-mail:
						<input type="email" name="email">
					</label>
					<label>
						Nome de usuário:
						<input type="text" name="user">
					</label>
					<label>
						Senha:
						<input type="password" name="password" id="password-1" required>
					</label>
					<label>
						Digite a senha novamente:
						<input type="password" name="password" id="password-2" required>
					</label>
					<input type="hidden" name="is_form_register" value="true">
					<br>
					<button>Cadastrar</button>
				</form><!-- #form-register -->
			</li><!-- .hentry -->
		</ul>

	</div> <!-- main -->

</div> <!-- sleeve -->

<?php get_footer(); ?>
