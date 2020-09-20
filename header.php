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

<div class="navbar__container">
      <div class="navbar__wrapper">

          <a href="<?php echo site_url('/home');?>" class="navbar__logo">
            <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/min-images/icons/logo.svg" alt=""/> -->
          </a>

          <img id="navbar__hamburguer-button" src="<?php echo get_template_directory_uri() ?>/assets/min-images/icons/hamburguer.svg" class="navbar__button--mobile" onclick="toggleNav();"  alt=""/>
          <img id="navbar__close-button" src="<?php echo get_template_directory_uri() ?>/assets/min-images/icons/close.svg"  class="navbar__button--mobile__hidden" onclick="toggleNav();" alt="" />

          <div class="navbar__items">
            
            <!-- INÍCIO -->
            <div class="navbar__items__item <?php echo (is_on_page(["home"]) ? "navbar__items__item--selected" : "") ?>">
              <a href="<?php echo site_url('/home');?>">Home</a>
            </div>

            <!-- TRABALHOS -->
            <div class="navbar__items__item <?php echo (is_on_page(["trabalhos"]) ? "navbar__items__item--selected" : "") ?>">
              <a href="<?php echo site_url('/trabalhos');?>">Filmes</a>
            </div>

            <!-- SOBRE -->
            <div class="navbar__items__item <?php echo (is_on_page(["sobre"]) ? "navbar__items__item--selected" : "") ?>">
                <a href="<?php echo site_url('/sobre');?>">Quem Somos</a>
            </div>

            <!-- SOBRE -->
            <div class="navbar__items__item <?php echo (is_on_page(["sobre"]) ? "navbar__items__item--selected" : "") ?>">
                <a href="<?php echo site_url('/sobre');?>">Trabalhos</a>
            </div>
          
          
          </div>
      </div>

      <div class="navbar--mobile__container" id="navbar--mobile__container">
        <div class="navbar--mobile__content">
            <a href="<?php echo site_url('/home');?>">Início</a>
            <a href="<?php echo site_url('/trabalhos');?>">Trabalhos</a>
            <a href="<?php echo site_url('/sobre');?>">Sobre</a>
            <!-- <a id="navbar--mobile__item--aprenda" onclick="toggleSubmenu('SUBMENU_APRENDA');">
              Aprenda
              <img src="<?php echo get_template_directory_uri(); ?>/assets/min-images/icons/menu_arrow_up.svg" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/min-images/icons/menu_arrow_down.svg" />
            </a> -->
            <div class="navbar--mobile__submenu" id="navbar--mobile__submenu--aprenda">
              <a href="#">Branding</a>
              <a href="#">Design</a>
              <a href="#">Negócios</a>
              <a href="#">Materiais Gratuitos</a>
            </div>
            <!-- <a id="navbar--mobile__item--compre" onclick="toggleSubmenu('SUBMENU_COMPRE');">
              Compre
              <img src="<?php echo get_template_directory_uri(); ?>/assets/min-images/icons/menu_arrow_up.svg" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/min-images/icons/menu_arrow_down.svg" />
            </a> -->
            <!-- <div class="navbar--mobile__submenu" id="navbar--mobile__submenu--compre">
              <a href="<?php echo site_url('/ferramentas');?>">Ferramentas</a>
              <a href="<?php echo site_url('/cursos');?>">Cursos</a>
              <a href="<?php echo site_url('/consultoria');?>">Consultoria</a>
            </div> -->
            <a href="<?php echo site_url('/novidades');?>">Novidades</a>
            <a href="<?php echo site_url('/contato');?>">Contato</a>
        </div>
    </div>
  </div>

  