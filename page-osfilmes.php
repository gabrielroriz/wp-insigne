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

        $counter = 1;
    ?>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- 
    ////////////
    // MODAIS //
    ////////////
-->
<?php while ($header_filmes->have_posts()) : $header_filmes->the_post(); ?>
<!-- Início do modal -->
<div id="modal-highlight-<?php echo $counter; ?>" class="modal">
    <div class="modal-content">
        <div class="modal-content__embedded"></div>
        <span class="close">
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
        </span>
        <div class="modal-content__video">
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
<?php endwhile; ?>

    <div class="filmes__header">
        <div class="filmes__header__title">
            <h1>
                Nossos filmes
            </h1>
            <h4>
                Aqui estão as nossas artes cinematográficas.
            </h4>
        </div>

        <div class="filmes__header__posters swiper-container">

            <div class="slider-button-desktop swiper-button-next">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-seta.svg"; ?>" />
            </div>

            <div class="swiper-wrapper">
                <?php while ($header_filmes->have_posts()) : $header_filmes->the_post(); ?>
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
                    <?php $counter = $counter + 1; ?>
                <?php endwhile; ?>
            </div>
        </div>

        <script>
            var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            slidesPerView: window.innerWidth > 883 ? "auto" : 1,
            spaceBetweem: 20,
            updateOnWindowResize: true,
            loop: false,

            // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
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

            <div onclick="openModal('modal-destaques-0')" class="filmes__destaques__img filmes__destaques__img1" style="background-image: url('<?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <!-- Início do modal -->
                <div id="modal-destaques-0" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__embedded"></div>
                        <span class="close">
                            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                        </span>
                        <div class="modal-content__video">
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
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[0]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[0]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

            <div onclick="openModal('modal-destaques-1')" class="filmes__destaques__img filmes__destaques__img2" style="background-image: url('<?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <!-- Início do modal -->
                <div id="modal-destaques-1" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__embedded"></div>
                        <span class="close">
                            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                        </span>
                        <div class="modal-content__video">
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
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[1]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[1]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

            <div onclick="openModal('modal-destaques-2')" class="filmes__destaques__img filmes__destaques__img3" style="background-image: url('<?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <!-- Início do modal -->
                <div id="modal-destaques-2" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__embedded"></div>
                        <span class="close">
                            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                        </span>
                        <div class="modal-content__video">
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
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[2]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[2]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

            <div onclick="openModal('modal-destaques-3')" class="filmes__destaques__img filmes__destaques__img4" style="background-image: url('<?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <!-- Início do modal -->
                <div id="modal-destaques-3" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__embedded"></div>
                        <span class="close">
                            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                        </span>
                        <div class="modal-content__video">
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
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2><?php echo $destaques_filmes[3]->post_title ?></h2>
                        <h4><?php echo get_post_meta($destaques_filmes[3]->ID, "FILMES_SUBTITULO")[0]; ?></h4>
                    </div>
                </div>
            </div>

            <div onclick="openModal('modal-destaques-4')" class="filmes__destaques__img filmes__destaques__img5" style="background-image: url('<?php echo get_post_meta($destaques_filmes[4]->ID, "FILMES_IMAGEM")[0]; ?>')">
                <!-- Início do modal -->
                <div id="modal-destaques-4" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__embedded"></div>
                        <span class="close">
                            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                        </span>
                        <div class="modal-content__video">
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
            <div class="filmes__destaquesmobile__item" onclick="openModal('modal-destaques-<?php echo $counter; ?>')">
                <!-- Início do modal -->
                <div id="modal-destaques-<?php echo $counter; ?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-content__embedded"></div>
                        <span class="close">
                            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                        </span>
                        <div class="modal-content__video">
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
                <div class="filmes__destaquesmobile__img"   style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>')"></div>
                <h2><?php the_title() ?></h2>
                <h4><?php echo get_post_meta(get_the_ID(), "FILMES_SUBTITULO")[0]; ?></h4>
            </div>
        <?php $counter++; endwhile; ?>
    </div>

    <script>
        function todosFilmesOnClick(event) {
            event.preventDefault();

            document.getElementById("tab_tipos").style.opacity = 0;
            document.getElementById("tab_tipos").style.height = 0;

            document.getElementById("tab_todos").style.opacity = 1;
            document.getElementById("tab_todos").style.height = "auto";

            document.getElementById("tab_tipo_button").classList.remove("filmes__tabs__selected");
            document.getElementById("tab_todos_button").classList.add("filmes__tabs__selected");
        }

        function tipoDeTrabalhoOnClick(event) {
            event.preventDefault();

            document.getElementById("tab_todos").style.opacity = 0;
            document.getElementById("tab_todos").style.height = 0;

            document.getElementById("tab_tipos").style.opacity = 1;
            document.getElementById("tab_tipos").style.height = "auto";

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
                    <div onclick="openModal('modal-filmes-<?php the_ID(); ?>')" 
                        class="filmes__tab__poster<?php echo ($counter >= 12 ? " filmes__tab__poster__more" : ""); ?>" 
                        style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');"
                    >
                        
                        <!-- Início do modal -->
                        <div id="modal-filmes-<?php the_ID(); ?>" class="modal">
                            <div class="modal-content">
                                <div class="modal-content__embedded"></div>
                                <span class="close">
                                    <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                                </span>
                                <div class="modal-content__video">
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
                    
                        <div class="filmes__tab__poster__grid">
                            <div class="filmes__tab__poster__text">
                                <span>
                                    <?php echo the_title(); ?>
                                </span>
                            </div>
                        </div>
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
                    document.getElementById("filmes__tab__loadmorebutton").style.visibility = "hidden";
                }
            </script>

            <div onclick="carregarMais(event)" class="filmes__tab__loadmorebutton" id="filmes__tab__loadmorebutton">
                Carregar Mais
            </div>

        </div>

        <div class="filmes__tab" id="tab_tipos">
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
                                <div onclick="openModal('modal-filmescat-<?php the_ID(); ?>')" class="filmes__tab__poster" style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');">
                                    <!-- Início do modal -->
                                    <div id="modal-filmescat-<?php the_ID(); ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-content__embedded"></div>
                                            <span class="close">
                                                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/close-icon.svg"; ?>" />
                                            </span>
                                            <div class="modal-content__video">
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

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close");

            console.log("span", span);

            var modal = document.getElementById(modal_id);
            modal.style.display = "block";

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                console.log("jfkdljfsd");
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