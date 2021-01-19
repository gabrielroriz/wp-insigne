<?php

require get_template_directory() . '/includes/utils.php';
require get_template_directory() . '/includes/customizer/customizer.php';
require get_template_directory() . '/includes/widgets/widget-example.php';
require get_template_directory() . '/includes/metaboxes/filmes.php';
require get_template_directory() . '/includes/metaboxes/projetos.php';


function theme_scripts()
{
    /**
     * COMMON
     */

    
    wp_enqueue_script('header-js', get_theme_file_uri('/js/header.js'), null, microtime(), true);
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), null, microtime(), true);
    wp_enqueue_style('style', get_stylesheet_uri(), null, microtime(), 'all');
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&display=swap', false); 

    /**
     * FOR EACH PAGE
     */

    global $post;
    if(is_page() || is_single()) {
        switch($post->post_name) {          
            case 'contato':
                wp_enqueue_script('instagram-feed-js', get_theme_file_uri('/js/utils/instagram-feed.js'), null, microtime(), true);
                wp_enqueue_script('page-contato-js', get_theme_file_uri('/js/page-contato.js'), null, microtime(), true);
                break;
        }
    }
}


add_action('wp_enqueue_scripts', 'theme_scripts');



function theme_head(){ ?>
<!-- <link rel="shortcut icon" href="<?php echo get_theme_file_uri();?>/assets/icon.png"> -->
<?php 
}

add_action('wp_head','theme_head');

// Remove aquela caixa feia de Custom Fields de todos os tipos de posts
add_action( 'do_meta_boxes', 'remove_default_custom_fields_meta_box', 1, 3 );
function remove_default_custom_fields_meta_box( $post_type, $context, $post ) {
    remove_meta_box( 'postcustom', $post_type, $context );
}


//Seta uma variável global da página que está.
function set_current_page_name( $pages ){
  global $current;
  $current = get_post_type(); 
  if($current == "page"){
     $current = get_post()->post_name; 
  } 
  console_log($current);
}

add_action( 'wp', 'set_current_page_name' );

//Remove o termo "Protegido" e "Privado" dos títulos
function the_title_trim($title) {

	$title = attribute_escape($title);

	$findthese = array(
		'#Protegido:#',
		'#Privado:#'
	);

	$replacewith = array(
		'', // What to replace "Protegido:" with
		'' // What to replace "Privado:" with
	);

	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}

add_filter('the_title', 'the_title_trim');

// Carrega o wp.media no javascript:
function load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

//Verifica se está dentro de um array de páginas.
function is_on_page( $pages ){
  foreach($pages as $page){
    if($GLOBALS['current'] == $page){ return true; }
  }
  return false;
}


// Adiciona custom post types
function create_custom_category($model_slug){
  register_taxonomy(
        $model_slug . '-category',
        'team',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' =>  $model_slug . '-category'),
            'hierarchical' => true,
        )
    );
}

function wp_register_custom_post_types() {

   /**
   * PROJETOS 
   */

  create_custom_category("projetos");

  $projetos_labels = array(
     'name' => _x( 'Projetos', 'Nome geral para o modelo Projetos' ),
     'singular_name' => _x( 'Projeto', 'Nome singularizado para o modelo Projeto' ),
     
  );

  $projetos_args = array(
    'labels' => $projetos_labels,
    'description' => 'Projetos disponíveis.',
    'public' => true,
    'has_archive'=> true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'menu_icon'         => 'dashicons-welcome-write-blog',
    'supports'          => array( 'title', 'thumbnail', 'custom-fields'),
    'taxonomies'        => array('projetos-category')
  );
  
  register_post_type('projetos', $projetos_args);


  /**
   * FILMES 
   */

  create_custom_category("filmes");

  $filmes_labels = array(
     'name' => _x( 'Filmes', 'Nome geral para o modelo Filmes' ),
     'singular_name' => _x( 'Filme', 'Nome singularizado para o modelo Filme' ),
     
  );

  $filmes_args = array(
    'labels' => $filmes_labels,
    'description' => 'Filmes disponíveis.',
    'public' => true,
    'has_archive'=> true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'menu_icon'         => 'dashicons-welcome-write-blog',
    'supports'          => array( 'title', 'thumbnail', 'custom-fields'),
    'taxonomies'        => array('filmes-category')
  );
  
  register_post_type('filmes', $filmes_args);

}

add_action( 'init', 'wp_register_custom_post_types' );


// Remove a barra de ADMIN.

function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );