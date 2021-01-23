<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>

  <?php 

  // Itens da NavBar.
  // Conteúdo: ([0] 'slug', [1] 'label');
  // Formato: ([0] 'contato', [1] 'Contato');
  $nav_items = array(
    array("home", "Home"),
    array("osfilmes", "Filmes"),
    array("quem-somos", "Quem somos"),
    array("contato", "Contato"),
  );

  ?>

  <div class="navbar__container">
      <div class="navbar__wrapper"> 

          <?php if(is_on_page(["osfilmes"])){ ?>
          <a href="<?php echo site_url('/home');?>" class="navbar__logo">
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/logos/insigneLogoRoxoRow.png.png"; ?>" style="margin-left:30px;width:200px" alt=""/>
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/logos/insingeLogoRoxoShort.svg"; ?>" alt=""/>
          </a>
          <?php } else { ?>
          <a href="<?php echo site_url('/home');?>" class="navbar__logo">
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/logos/insigneLogoAmareloRow.png"; ?>" alt=""/>
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/logos/insingeLogoAmareloShort.svg"; ?>" alt=""/>
          </a>
          <?php } ?>

          <img 
            class="navbar--mobile__button" 
            id="navbar-mobile-hamb-button" 
            src="<?php echo get_template_directory_uri() ?>/assets/min-images/icons/hamburguer.svg" 
            onclick="toggleNav();"  
            alt=""
          />

          <img 
            class="navbar--mobile__button--hidden" 
            id="navbar-mobile-close-button" 
            src="<?php echo get_template_directory_uri() ?>/assets/min-images/icons/close.svg"  
            onclick="toggleNav();" 
            alt="" />

          <!--
            Para cada item do menu, extraímos o slug e o label da página.
            EX: slug ("home") e label ("Home").
          -->
          <ul class="navbar__items">
            <?php foreach($nav_items as $nav_item) { $page_slug = $nav_item[0]; /* */ $page_label = $nav_item[1]; ?>
            <!-- Caso estiver na página deste item do menu, adicionar a classe com mode "--selected". -->
            <li class="navbar__items__item <?php echo (is_on_page([$page_slug]) ? "navbar__items__item--selected" : ""); ?>">
              <!-- Adiciona o item com o label da página e o link para o '/slug' -->
              <a href="<?php echo site_url('/' . $page_slug); ?>">
                <?php echo $page_label; ?>
              </a>
            </li>
              
            <?php } ?>
          </ul>
      </div>

      <div class="navbar--mobile__container" id="navbar-mobile-box">
        <div class="navbar--mobile__content">
            <?php foreach($nav_items as $nav_item) { $page_slug = $nav_item[0]; /* */ $page_label = $nav_item[1]; ?>
              <a title="<?php echo $page_label; ?>" href="<?php echo site_url('/' . $page_slug);?>"><?php echo $page_label; ?></a>
            <?php } ?>
        </div>
    </div>
  </div>

  <div class="app">
    <div class="app__content">

  