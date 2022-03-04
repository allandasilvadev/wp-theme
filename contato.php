<?php
/* Template Name: Formulario de contato */

// validacao
$errors = NULL;
$send = FALSE;

$value_nome = '';
$value_email = '';
$value_mensagem = '';

if ( isset( $_POST[ 'enviar' ] ) ) {

    if ( ! isset( $_POST['cform_generate_nonce'] ) || ! wp_verify_nonce( $_POST['cform_generate_nonce'], basename( __FILE__ ) ) ) {
    	$errors = 'Nonce inválido.';
    } else {

    }

	
	// valida a mensagem.
	$message = stripslashes( strip_tags( $_POST['mensagem'] ) );

	if ( trim( $message ) === '' || strlen( $message ) <= 5 ) {
		$errors = 'A mensagem não foi informada, ou possui menos de 5 letras.';	

		if ( isset( $_POST['nome'] ) ) {
			$value_nome = $_POST['nome'];
		} else {
			$value_nome = '';
		}

		if ( isset( $_POST['email'] ) ) {
			$value_email = $_POST['email'];
		} else {
			$value_email = '';
		}

		if ( isset( $_POST['mensagem'] ) ) {
			$value_mensagem = $_POST['mensagem'];
		} else {
			$value_mensagem = '';
		}
	}


	// valida o e-mail.
	$email = trim( $_POST['email'] );

	if ( trim( $email ) === '' ) {
		$errors = 'Informe seu endereço de e-mail.';	

		if ( isset( $_POST['nome'] ) ) {
			$value_nome = $_POST['nome'];
		} else {
			$value_nome = '';
		}

		if ( isset( $_POST['email'] ) ) {
			$value_email = $_POST['email'];
		} else {
			$value_email = '';
		}

		if ( isset( $_POST['mensagem'] ) ) {
			$value_mensagem = $_POST['mensagem'];
		} else {
			$value_mensagem = '';
		}

	} elseif( !filter_var( trim( $_POST['email'] ), FILTER_VALIDATE_EMAIL ) ) {
		$errors = 'Endereço de e-mail inválido.';		

		if ( isset( $_POST['nome'] ) ) {
			$value_nome = $_POST['nome'];
		} else {
			$value_nome = '';
		}

		if ( isset( $_POST['email'] ) ) {
			$value_email = $_POST['email'];
		} else {
			$value_email = '';
		}

		if ( isset( $_POST['mensagem'] ) ) {
			$value_mensagem = $_POST['mensagem'];
		} else {
			$value_mensagem = '';
		}
	}

	// valida o nome.
	$nome = trim( strip_tags( $_POST['nome'] ) );

	if ( $nome === '' ) {
		$errors = 'Informe seu nome.';

		if ( isset( $_POST['nome'] ) ) {
			$value_nome = $_POST['nome'];
		} else {
			$value_nome = '';
		}

		if ( isset( $_POST['email'] ) ) {
			$value_email = $_POST['email'];
		} else {
			$value_email = '';
		}

		if ( isset( $_POST['mensagem'] ) ) {
			$value_mensagem = $_POST['mensagem'];
		} else {
			$value_mensagem = '';
		}
	}


	// envia o e-mail.

	if ( is_null( $errors ) ) {
		$emailpara = get_option( 'admin_email' );

		$assunto = '[Blog Treinaweb] de ' . $nome;
		$body = "Name: $nome\n\nE-mail: $email \n\nComments: $message";

		// aqui a funcao de email.

		// e-mai enviado com sucesso.
		$send = TRUE;
	}
}

?>


<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="span9">
	<!-- Implementar o formulário aqui. -->

	<h2>Formulário de contato</h2>

	<p>Sugestão, crítica ou parceria ? Contate-nos.</p>

	<br>

	<!-- Mensagem de erro ou de sucesso no envio do e-mail. -->
	<?php if ( $send === TRUE ) : ?>
	    <div class="alert alert-success">
            <button style="margin-top: 12px;" type="button" class="close" data-dismiss="alert">&times;</button>
            <p style="display: block; margin-top: 8px;">
            	<strong>E-mail enviado! </strong> Obrigado pelo contato. Retornaremos em breve. 	
            </p>            
        </div>
	<?php elseif ( ! is_null( $errors ) ) : ?>
		<div class="alert alert-error">
            <button style="margin-top: 12px;" type="button" class="close" data-dismiss="alert">&times;</button>
            <p style="display: block; margin-top: 8px;"><strong>Error: </strong><?php echo $errors; ?></p>
        </div>
	<?php endif; ?>


	<!-- Formulario de contato -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<form action="<?php the_permalink(); ?>" method="post" id="" class="form-horizontal">
			<?php wp_nonce_field( basename( __FILE__ ), 'cform_generate_nonce' ); ?>
			<div class="control-group">
				<label class="control-label" for="nome">Nome</label>
				<div class="controls">
					<input type="text" name="nome" id="nome" value="<?php echo $value_nome; ?>">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="email">E-mail</label>
				<div class="controls">
					<input type="text" name="email" id="email" value="<?php echo $value_email; ?>">
				</div>
			</div>

			<div class="control-group">
				<label for="mensagem" class="control-label">Mensagem</label>
				<div class="controls">
					<textarea name="mensagem" id="mensagem" cols="40" rows="6" style="resize: none;"><?php echo $value_mensagem; ?></textarea>
				</div>				
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
				</div>
			</div>

		</form>
	<?php endwhile; endif; ?>

	<nav class="post-nav">
  		<ul class="pager">
    		<li class="previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></li>
    		<li class="next"><?php next_post_link( '%link', '%title &rarr;' ); ?></li>
  		</ul>
	</nav>

</div>
<?php get_footer(); ?>