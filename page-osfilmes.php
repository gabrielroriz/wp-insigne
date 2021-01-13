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
            <div class="filmes__destaques__img filmes__destaques__img1">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>" />
            </div>
            <div class="filmes__destaques__img filmes__destaques__img2">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>" />
            </div>
            <div class="filmes__destaques__img filmes__destaques__img3">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>" />
            </div>
            <div class="filmes__destaques__img filmes__destaques__img4">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>" />
            </div>
            <div class="filmes__destaques__img filmes__destaques__img5">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/filmes/img-primeiro-projeto.png"; ?>" />
            </div>
        </div>

    </div>

    <div class="filmes__tabs">
        <div class="filmes__tabs__title">
            <div class="filmes__tabs__text">
                Filtragem
            </div>
        </div>
        <div class="filmes__tabs__wrapper">
            <a href="#" class="filmes__tabs__button filmes__tabs__selected" id="tab_todos_button">
                Todos os trabalhos
            </a>

            <a href="#" class="filmes__tabs__button" id="tab_tipo_button">
                Tipo de trabalho
            </a>
        </div>
        <div class="filmes__tab" id="tab_todos">
            <?php for ($i = 0; $i < 20; $i++) : ?>
                <div class="filmes__tab__poster" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/min-images/filmes/poster.png"; ?>');">
                    <div class="filmes__tab__poster__grid">
                        <div class="filmes__tab__poster__text">
                            <span>
                                Catho
                            </span>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="filmes__tab" id="tab_tipo">
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

            // $filmes_por_categoria = new WP_Query([
            //     "post_type"=> "filmes",
            //     "tax_query" => [
            //         "taxonomy" => "filmes-category"
            //     ]
            // ]);

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
                            <div class="filmes__griditem">
                                <img src="<?php echo get_post_meta(get_the_ID(), "FILMES_IMAGEM")[0]; ?>">
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

            <?php endforeach; ?>

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
                <span>Horário de atendimento: <br/> das 08:00h às 17:00h.</span>
            </div>
        </div>
        <img width="100%" src="<?php echo get_template_directory_uri() . "/assets/min-images/quemsomos/notavel-baixo.svg"; ?>" alt="">
    </div>

    <?php //get_footer()
    ?>
</div>