<?php

// não permite o acesso direto ao arquivo.
if ( isset( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die( 'Please do not load this page directly. Thanks!' );
}

// verifica se o post é protegido por senha.
if ( post_password_required() ) {
    echo '<p>Esse post é protegido por senha. Informe a senha para ver os comentários.</p>';
    return;
}

// verifica se o post permite a publicacao de comentarios.
if ( ! comments_open() ) {
    echo '<p>Não são permitidos comentários para esse post atualmente.</p>';
}
?>

<div class="comentarios">
    <?php if ( have_comments() ) : ?>
        <h2>
            <?php 
                printf( 
                    _nx( 
                        '1 comentário em "%2$s"', 
                        '%1$s comentários em "%2$s"', 
                        get_comments_number(), 
                        'comments number',
                        'treinaweb'
                    ), 
                    get_comments_number(), 
                    get_the_title() 
                );
            ?>
        </h2>
        
        <ol class="lista-comentarios">
        <?php 
            wp_list_comments( array(
                'style' => 'ol' ,
                'avatar_size' => 32,
                'per_page' => 2 
            ) );
        ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div class="navigation">
                <div class="alignleft"><?php previous_comments_link(); ?></div>
                <div class="alignright"><?php next_comments_link(); ?></div>
            </div>
        <?php endif; ?>

    <?php else: ?>  
        <?php if ( comments_open() ) : ?>
            <div class="alert alert-info">
                <h4 style="margin-top:6px;margin-bottom: 6px;">Sem comentários</h4>
                Nenhum comentário encontrado, seja o primeiro a comentar sobre esse post.
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                <p style="margin-top: 12px;">Não são permitidos comentários para esse post atualmente.</p>
            </div>
        <?php endif; ?>       
    <?php endif; ?>

    <?php 
        comment_form( array(
            'title_reply' => 'Comentários',
            'comment_notes_before' => '<div class="alert alert-danger"><p style="margin-top: 8px;">O seu endereço de e-mail não será publicado.</p></div>',
            'class_submit' => 'btn btn-success',
            'label_submit' => 'Enviar'
        ) );

    ?>
</div>