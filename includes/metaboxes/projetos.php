<?php
/***
 * Importar esta página no functions.php
 */
require_once get_template_directory() . '/includes/metaboxes/generator.php';

function add_projeto_meta_box()
{
  add_meta_box(
    'projeto_meta_box',          // Metabox ID
    'Projeto',                   // Título
    'projeto_meta_box_html',     // Callback do formulário
    'projetos'                   // Post type
  );
}
add_action('add_meta_boxes', 'add_projeto_meta_box');

function projeto_meta_box_html($post)
{
    metabox_styling();
    metabox_begin();
    
    metabox_title("Geral");
    metabox_text_field("PROJETOS_NOME", "Nome");
    metabox_textarea_field("PROJETOS_DESC", "Descrição");
    metabox_textarea_field("PROJETOS_EMBEDDED", "Código Embedded do Vídeo");
    metabox_image_field("PROJETOS_IMAGEM", "Imagem");
        
    metabox_end();
}

function projeto_meta_box_save($post_id)
{
    if(isset($_POST) && !empty($_POST))
    {
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        $fields_list = [
            "PROJETOS_NOME",
            "PROJETOS_DESC",
            "PROJETOS_EMBEDDED",
            "PROJETOS_IMAGEM"
        ];

        metabox_save($fields_list, $post_id);
    }
    
    return $post_id;
}
add_action('save_post_projeto', 'projeto_meta_box_save', 100, 1);