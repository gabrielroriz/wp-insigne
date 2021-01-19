<div class="filmes">
    <?php get_header() ?>

    <div class="filmes__header">
        <div class="filmes__header__title">
            <h1>
                Nossos filmes
            </h1>
            <h4>
                Aqui estão as nossas artes cinematográficas.
            </h4>
        </div>

        <div class="filmes__header__posters">
            <div class="filmes__highlight" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>');">
                <div class="filmes__highlight__number">
                    01
                </div>
                <div class="filmes__highlight__text">
                    General Electric
                </div>
            </div>
        </div>
    </div>

    <div class="filmes__destaques">

        <div class="filmes__destaques__title">
            <div class="filmes__destaques__text">Destaques</div>
            <div class="filmes__destaques__img filmes__destaques__img1" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2>General Electric</h2>
                        <h4>General Electric</h4>
                    </div>
                </div>
            </div>
            <div class="filmes__destaques__img filmes__destaques__img2" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2>General Electric</h2>
                        <h4>General Electric</h4>
                    </div>
                </div>
            </div>
            <div class="filmes__destaques__img filmes__destaques__img3" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2>General Electric</h2>
                        <h4>General Electric</h4>
                    </div>
                </div>
            </div>
            <div class="filmes__destaques__img filmes__destaques__img4" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2>General Electric</h2>
                        <h4>General Electric</h4>
                    </div>
                </div>
            </div>
            <div class="filmes__destaques__img filmes__destaques__img5" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>')">
                <div class="filmes__destaques__img__overlay">
                    <div class="filmes__destaques__img__overlaytext">
                        <h2>General Electric</h2>
                        <h4>General Electric</h4>
                    </div>
                </div>
            </div>
        </div>

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

            <?php
                $filmes = new WP_Query([
                    "post_type" => "filmes",
                    "posts_per_page" => 16,
                    "page" => 1
                ]);
            ?>
        
            <?php while ($filmes->have_posts()) : $filmes->the_post(); ?>
                <div class="filmes__tab__poster" style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');">
                    <div class="filmes__tab__poster__grid">
                        <div class="filmes__tab__poster__text">
                            <span>
                                Catho
                            </span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
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
                $categorias = get_terms([
                    "taxonomy" => "filmes-category",
                    "hide_empty" => false
                ]);

                ?>

                <?php foreach ($categorias as $categoria) : ?>

                    <?php
                    $filmes = new WP_Query([
                        "post_type" => "filmes",
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
                            <div class="filmes__tab__poster" style="background-image: url('<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>');">
                                <div class="filmes__tab__poster__grid">
                                    <div class="filmes__tab__poster__text">
                                        <span>
                                            Catho
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

    <?php //get_footer()
    ?>
</div>