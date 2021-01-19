<?php
/***
 * Importar esta página no functions.php
 */
require_once get_template_directory() . '/includes/metaboxes/generator.php';

function add_filme_meta_box()
{
  add_meta_box(
    'filme_meta_box',          // Metabox ID
    'Filme',                   // Título
    'filme_meta_box_html',     // Callback do formulário
    'filmes'                   // Post type
  );
}
add_action('add_meta_boxes', 'add_filme_meta_box');

function filme_meta_box_html($post)
{
    metabox_styling();
    metabox_begin();
    
    metabox_title("Geral");
    metabox_text_field("FILMES_SUBTITULO", "Subtítulo");
    metabox_textarea_field("FILMES_DESC", "Descrição");
    metabox_textarea_field("FILMES_EMBEDDED", "Código Embedded do Vídeo");
    metabox_image_field("FILMES_IMAGEM", "Imagem");
        
    metabox_end();
}

function filmes_meta_box_save($post_id)
{
    if(isset($_POST) && !empty($_POST))
    {
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        $fields_list = [
            "FILMES_SUBTITULO",
            "FILMES_DESC",
            "FILMES_EMBEDDED",
            "FILMES_IMAGEM"
        ];

        metabox_save($fields_list, $post_id);
    }
    
    return $post_id;
}
add_action('save_post_filmes', 'filmes_meta_box_save', 100, 1);