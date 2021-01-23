    <?php get_header() ?>

    <?php
        $header_filmes = new WP_Query([
            "post_type" => "filmes",
            "tax_query" => [
                [
                    "taxonomy" => "filmes-category",
                    "field" => "slug",
                    "terms" => "slider"
                ]
            ]
        ]);
    ?>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- 
    ////////////
    // MODAIS //
    ////////////
-->
<?php $counter = 1; while ($header_filmes->have_posts()) : $header_filmes->the_post(); ?>
<!-- Início do modal -->
<div id="modal-highlight-<?php echo $counter; ?>" class="modal">
    <div class="modal-content">
        <div class="modal-content__video">
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" class="close" id="modal-highlight-<?php echo $counter; ?>-close"/>
            <?php echo get_post_meta(get_the_ID(), "FILMES_EMBEDDED")[0]; ?>
        </div>
        <div class="modal-content__texto">
            <h2><?php the_title(); ?> - </h2><h4><?php echo get_post_meta(get_the_ID(), "FILMES_SUBTITULO")[0]; ?></h4> 
            <p>
                <?php echo get_post_meta(get_the_ID(), "FILMES_DESC")[0]; ?>
            </p>
        </div>
    </div>
</div>


<!-- Fim do modal -->
<?php $counter++; endwhile; ?>

    <div class="filmes__header">
        <div class="filmes__header__title">
            <h1>
                Nossos filmes
            </h1>
            <h4>
                Aqui estão as nossas artes cinematográficas.
            </h4>
        </div>

        <div class="filmes__header__posters swiper-container swiper-container--desktop">

            <div class="slider-button-desktop swiper-button-next">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-seta.svg"; ?>" />
            </div>

            <div class="swiper-wrapper">
                <?php $counter = 1; while ($header_filmes->have_posts()) : $header_filmes->the_post(); ?>
                    <div 
                        class="filmes__highlight swiper-slide" 
                        style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');" 
                        onclick="openModal('modal-highlight-<?php echo $counter; ?>')"
                    >
                    

                        <div class="filmes__highlight__number">
                            <?php echo "0".$counter; ?>
                        </div>
                        <div class="filmes__highlight__text">
                            <?php the_title(); ?>
                        </div>
                    </div>
                <?php $counter++; endwhile; ?>
            </div>
        </div>

        <script>
            var mySwiper = new Swiper('.swiper-container--desktop', {
            direction: 'horizontal',
            slidesPerView: "auto",
            spaceBetweem: 20,
            updateOnWindowResize: true,
            loop: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            });
        </script>

    
    <div class="filmes__header__posters--mobile swiper-container swiper-container--mobile">
    
            <div class="swiper-wrapper swiper-wrapper--mobile">

            <?php $counter = 1; while ($header_filmes->have_posts()) : $header_filmes->the_post(); ?>
                <div class="swiper-slide swiper-slide--mobile" >

                    <div class="filmes__header__posters--mobile__highlight" 
                            style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');" 
                            onclick="openModal('modal-highlight-<?php echo $counter; ?>')">
                            
                        <div class="filmes__header__posters--mobile__highlight__number">
                            <?php echo "0".$counter; ?>
                        </div>
                        <div class="filmes__header__posters--mobile__highlight__text">
                            <?php the_title(); ?>
                        </div>
                    </div>

                </div>
            <?php $counter++; endwhile; ?>

            </div>
        </div>

        <div class="filmes__header__posters--mobile__button-container">
            <div class="filmes__header__posters--mobile__button-container__content">
                <div class="swiper-button-prev--mobile">
                    <img src="<?php echo get_template_directory_uri() . "/assets/min-images/icons/arrowRight.svg"; ?>" />
                </div>
                <div class="swiper-button-next--mobile">
                    <img src="<?php echo get_template_directory_uri() . "/assets/min-images/icons/arrowRight.svg"; ?>" />
                </div>
            </div>
        </div>

        <script>
            var swiper = new Swiper('.swiper-container--mobile', {
            slidesPerView: 1,
            direction: 'horizontal',
            navigation: {
                nextEl: '.swiper-button-next--mobile',
                prevEl: '.swiper-button-prev--mobile',
            },
            });
        </script>

</div>

    <div class="filmes__destaques">

        <?php
            $destaques_filmes = new WP_Query([
                "post_type" => "filmes",
                "posts_per_page" => 5,
                "tax_query" => [
                    [
                        "taxonomy" => "filmes-category",
                        "field" => "slug",
                        "terms" => "destaques"
                    ]
                ]
            ]);
            $destaques_filmes = $destaques_filmes->posts;

        ?>
                            
        <div class="filmes__destaques__title">
            <div class="filmes__destaques__text">Destaques</div>
        </div>
        <div class="filmes__destaques__mosaico">
             <!-- Início do modal -->
             <div id="modal-destaques-0" class="modal">
                    <div class="modal-content">
                        
                        <div class="modal-content__video">
                            <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-destaques-0-close" />
                            <?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_EMBEDDED")[0]; ?>
                        </div>
                        <div class="modal-content__texto">
                            <h2><?php echo $destaques_filmes[0]->post_title; ?> - </h2><h4><?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_SUBTITULO")[0]; ?></h4> 
                            <p>
                                <?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_DESC")[0]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Fim do modal -->
            <div onclick="openModal('modal-destaques-0')" class="filmes__destaques__img filmes__destaques__img1" style="background-image: url('<?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[0]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>


            <!-- Início do modal -->
            <div id="modal-destaques-1" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__video">
                            <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-destaques-1-close" />
                        <?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_EMBEDDED")[0]; ?>
                        </div>
                        <div class="modal-content__texto">
                            <h2><?php echo $destaques_filmes[1]->post_title; ?> - </h2><h4><?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_SUBTITULO")[0]; ?></h4> 
                            <p>
                            <?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_DESC")[0]; ?>
                            </p>
                        </div>
                    </div>
            </div>
            <!-- Fim do modal -->
            <div onclick="openModal('modal-destaques-1')" class="filmes__destaques__img filmes__destaques__img2" style="background-image: url('<?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[1]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

            <!-- Início do modal -->
            <div id="modal-destaques-2" class="modal">
                    <div class="modal-content">
                      
                        
                        <div class="modal-content__video">
                        <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-destaques-2-close"/>
                        <?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_EMBEDDED")[0]; ?>
                        </div>
                        <div class="modal-content__texto">
                            <h2><?php echo $destaques_filmes[2]->post_title; ?> - </h2><h4><?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_SUBTITULO")[0]; ?></h4> 
                            <p>
                            <?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_DESC")[0]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Fim do modal -->

            <div onclick="openModal('modal-destaques-2')" class="filmes__destaques__img filmes__destaques__img3" style="background-image: url('<?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[2]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

             <!-- Início do modal -->
             <div id="modal-destaques-3" class="modal">
                    <div class="modal-content">
                      
                      
                        <div class="modal-content__video">
                        <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-destaques-3-close" />
                        <?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_EMBEDDED")[0]; ?>
                        </div>
                        <div class="modal-content__texto">
                            <h2><?php echo $destaques_filmes[3]->post_title; ?> - </h2><h4><?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_SUBTITULO")[0]; ?></h4> 
                            <p>
                            <?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_DESC")[0]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Fim do modal --> 

            <div onclick="openModal('modal-destaques-3')" class="filmes__destaques__img filmes__destaques__img4" style="background-image: url('<?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_IMAGEM")[0]; ?>')">
                      
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[3]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

            <!-- Início do modal -->
            <div id="modal-destaques-4" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__video">
                        <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-destaques-4-close" />
                        <?php echo get_post_meta($destaques_filmes[4]->ID, "FILMES_EMBEDDED")[0]; ?>
                        </div>
                        <div class="modal-content__texto">
                            <h2><?php echo $destaques_filmes[4]->post_title; ?> - </h2><h4><?php echo get_post_meta($destaques_filmes[4]->ID, "FILMES_SUBTITULO")[0]; ?></h4> 
                            <p>
                            <?php echo get_post_meta($destaques_filmes[4]->ID, "FILMES_DESC")[0]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Fim do modal -->

            <div onclick="openModal('modal-destaques-4')" class="filmes__destaques__img filmes__destaques__img5" style="background-image: url('<?php echo get_post_meta($destaques_filmes[4]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[4]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[4]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="filmes__destaquesmobile">

        <?php
            $destaques_filmes = new WP_Query([
                "post_type" => "filmes",
                "posts_per_page" => 5,
                "tax_query" => [
                    [
                        "taxonomy" => "filmes-category",
                        "field" => "slug",
                        "terms" => "destaques"
                    ]
                ]
            ]);

            $counter = 0;

        ?>
                            
        <div class="filmes__destaquesmobile__title">
            <div class="filmes__destaquesmobile__text">Destaques</div>
        </div>

        <?php while ($destaques_filmes->have_posts()) : $destaques_filmes->the_post(); ?>
            <!-- Início do modal -->
            <div id="modal-mobile-destaques-<?php echo $counter; ?>" class="modal">
                    <div class="modal-content">ss
                      
                        <div class="modal-content__video">
                            <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-mobile-destaques-<?php echo $counter; ?>-close" />
                            <?php echo get_post_meta(get_the_ID(), "FILMES_EMBEDDED")[0]; ?>
                        </div>
                        <div class="modal-content__texto">
                            <h2><?php echo the_title(); ?> - </h2><h4><?php echo get_post_meta(get_the_ID(), "FILMES_SUBTITULO")[0]; ?></h4> 
                            <p>
                                <?php echo get_post_meta(get_the_ID(), "FILMES_DESC")[0]; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <!-- Fim do modal -->

            <div class="filmes__destaquesmobile__item" onclick="openModal('modal-mobile-destaques-<?php echo $counter; ?>')">
                <div class="filmes__destaquesmobile__img"   style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>')"></div>
                <h2><?php the_title() ?></h2>
                <h4><?php echo get_post_meta(get_the_ID(), "FILMES_SUBTITULO")[0]; ?></h4>
            </div>
        <?php $counter++; endwhile; ?>
    </div>

    <script>
        function todosFilmesOnClick(event) {
            event.preventDefault();

            console.log("clicou carai");

            document.getElementById("tab_tipos").style.display = "none";
            
            document.getElementById("tab_todos").style.removeProperty("display");

            document.getElementById("tab_tipo_button").classList.remove("filmes__tabs__selected");
            document.getElementById("tab_todos_button").classList.add("filmes__tabs__selected");
        }

        function tipoDeTrabalhoOnClick(event) {
            event.preventDefault();

            document.getElementById("tab_todos").style.display = "none";

            document.getElementById("tab_tipos").style.removeProperty("display");            

            document.getElementById("tab_todos_button").classList.remove("filmes__tabs__selected");
            document.getElementById("tab_tipo_button").classList.add("filmes__tabs__selected");
        }
    </script>

    <div class="filmes__tabs">
        <div class="filmes__tabs__title">
            <div class="filmes__tabs__text">
                Filtragem
            </div>
        </div>
        <div class="filmes__tabs__wrapper">
            <a onclick="todosFilmesOnClick(event)" href="#" class="filmes__tabs__button filmes__tabs__selected" id="tab_todos_button">
                Todos os filmes
            </a>

            <a onclick="tipoDeTrabalhoOnClick(event)" href="#" class="filmes__tabs__button" id="tab_tipo_button">
                Tipo de trabalho
            </a>
        </div>
        <div class="filmes__tab" id="tab_todos">
            <div id="tab_todos__wrapper">
                <?php
                    $filmes = new WP_Query([
                        "post_type" => "filmes",
                        "posts_per_page" => -1
                    ]);

                    $counter = 0;
                ?>
            
                <?php while ($filmes->have_posts()) : $filmes->the_post(); ?>
                             
                        <!-- Início do modal -->
                        <div id="modal-filmes-<?php the_ID(); ?>" class="modal">
                            <div class="modal-content">                             
                                <div class="modal-content__video">
                                    <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>"  id="modal-filmes-<?php the_ID(); ?>-close" />
                                    <?php echo get_post_meta(get_the_id(), "FILMES_EMBEDDED")[0]; ?>
                                </div>
                                <div class="modal-content__texto">
                                    <h2><?php the_title(); ?> - </h2><h4><?php echo get_post_meta(get_the_id(), "FILMES_SUBTITULO")[0]; ?></h4> 
                                    <p>
                                    <?php echo get_post_meta(get_the_id(), "FILMES_DESC")[0]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Fim do modal -->
                    <div onclick="openModal('modal-filmes-<?php the_ID(); ?>')" 
                        class="filmes__tab__poster<?php echo ($counter >= 12 ? " filmes__tab__poster__more" : ""); ?>" 
                        style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');"
                    >
           
                    
                        <div class="filmes__tab__poster__grid">
                            <div class="filmes__tab__poster__text">
                                <span>
                                    <?php echo the_title(); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="filmes__tab__poster__mobiletext<?php echo ($counter >= 12 ? " filmes__tab__poster__more" : ""); ?>">
                        <?php echo the_title(); ?>
                    </div>
                <?php $counter++; endwhile; ?>
            </div>

            <script>
                function carregarMais(event) {
                    event.preventDefault();
                    let hiddenElements = document.getElementsByClassName("filmes__tab__poster__more");
                    for(let i=0; i<hiddenElements.length; i++) {
                        hiddenElements[i].style.display = "block";
                    }
                    document.getElementById("filmes__tab__loadmorebutton").style.display = "none";
                }
            </script>

            <div onclick="carregarMais(event)" class="filmes__tab__loadmorebutton" id="filmes__tab__loadmorebutton">
                Carregar Mais
            </div>

        </div>

        <div class="filmes__tab" id="tab_tipos" style="display: none;">
            <div class="filmes__tab__wrapper">

                <?php
                $tipos = [
                    "Storytelling",
                    "Lançamentos - Super Lives",
                    "Publicidade",
                    "Animação/Motion",
                    "Obras Originais",
                    "Branded Content",
                    "Institucionais"
                ];
                // remover as categorias administrativas:
                // slider e  destaques
                $categorias = get_terms([
                    "taxonomy" => "filmes-category",
                    "hide_empty" => true
                ]);

                $categorias = array_filter($categorias, function($categoria) {
                    return $categoria->slug != "slider" && $categoria->slug != "destaques";
                });


                ?>

                <?php foreach ($categorias as $categoria) : ?>

                    <?php
                    $filmes = new WP_Query([
                        "post_type" => "filmes",
                        "posts_per_page" => 4,
                        "tax_query" => [
                            [
                                "taxonomy" => "filmes-category",
                                "field" => "slug",
                                "terms" => $categoria->slug
                            ]
                        ]
                    ]);
                    ?>

                    <div class="filmes__row">
                        <div class="filmes__row__head">
                            <h3><?php echo $categoria->name; ?></h3>
                            <h4><a href="<?php echo "/filmes-category/" . $categoria->slug . "/"; ?>">Veja todos</a></h4>
                        </div>
                        <div class="filmes__row__grid">
                            <?php while ($filmes->have_posts()) : $filmes->the_post(); ?>
                               <!-- Início do modal -->
                               <div id="modal-filmescat-<?php the_ID(); ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-content__video">
                                            <img class="close" src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" id="modal-filmescat-<?php the_ID(); ?>-close" />
                                            <?php echo get_post_meta(get_the_id(), "FILMES_EMBEDDED")[0]; ?>
                                            </div>
                                            <div class="modal-content__texto">
                                                <h2><?php the_title(); ?> - </h2><h4><?php echo get_post_meta(get_the_id(), "FILMES_SUBTITULO")[0]; ?></h4> 
                                                <p>
                                                <?php echo get_post_meta(get_the_id(), "FILMES_DESC")[0]; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim do modal -->
                                <div onclick="openModal('modal-filmescat-<?php the_ID(); ?>')" class="filmes__tab__poster" style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');">
                                    <div class="filmes__tab__poster__grid">
                                        <div class="filmes__tab__poster__text">
                                            <span>
                                                <?php echo the_title(); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </div>

    <div class="filmes__cta">
        <img width="100%" src="<?php echo get_template_directory_uri() . "/assets/min-images/quemsomos/notavel-cima.svg"; ?>" alt="">
        <div class="filmes__cta__darkpurple">
            <div class="filmes__cta__texto">
                Nós te ajudamos <br>a ser notável.
            </div>
            <div class="filmes__cta__button">
                <a href="">Entrar em contato via WhatsApp</a>
                <span>Horário de atendimento: <br /> das 08:00h às 17:00h.</span>
            </div>
        </div>
        <img width="100%" src="<?php echo get_template_directory_uri() . "/assets/min-images/quemsomos/notavel-baixo.svg"; ?>" alt="">
    </div>

    <script>
        
        // When the user clicks on the button, open the modal
        function openModal(modal_id) {
            var image = document.getElementById(modal_id + "-close");

            var modal = document.getElementById(modal_id);
            modal.style.display = "flex";

            console.log({modalId: modal_id, image, modal});

            // When the user clicks on <image> (x), close the modal
            image.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

    </script>

    <?php get_footer();?>