<?php get_header() ?>

    <?php 
        $home_title = "\"Bravo\" é o mínimo.";
    ?>

    <div class="home__header">
        <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/header/headerBottomPath.svg"; ?>" class="home__header__bottom-path" />
        
        <div class="home__header__title"><?php echo $home_title; ?></div>
    </div>

    <?php 

        $projetos = array(
            array("Projeto 01", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 02", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 03", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 04", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 05", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 06", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 07", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 08", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 09", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
            array("Projeto 10", "Breve descrição do projeto 01 de no máximo de 02 linhas"),
        );

    ?>

      <?php 

        $args = array( 
            "post_type" => "filmes",
            "post_statu" => "publish",
            'orderby' => 'date',
            "order" => "ASC",
            'posts_per_page' => 4
        );

        $filmes = array();

        $loop = new WP_Query($args); 

        while ($loop->have_posts()) : $loop->the_post();
            array_push($filmes, array(get_post_meta(get_the_ID(), "FILMES_IMAGEM", true), get_post_permalink()));
        endwhile;

        wp_reset_postdata();
    ?>


    <div class="home__projetos">
        <div class="home__projetos__wrapper">
            <div class="home__projetos__grid">
                <?php foreach($filmes as $filme) {
                    $filme__image = $filme[0];
                    $filme__link = $filme[1];
                ?>
                <a class="home__projetos__grid__item" 
                   style="background-image: url(<?php echo $filme__image; ?>);" 
                   href="<?php echo $filme__link; ?>"
                >
                </a>
                <?php } ?>
            </div>
        </div>  

    </div>

    <!-- SEÇÃO CANCELADA! -->

    <!-- <div class="home__clientes">
        <div class="home__clientes__wrapper">    
            <div class="home__clientes__title">
                NOSSOS CLIENTES
            </div>

            <div class="home__clientes__content">
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
                <div class="home__clientes__item"></div>    
            </div>
        </div>
    </div> -->

    <div class="home__sobre">
        <div class="home__sobre__wrapper">    
            <div class="home__sobre__title">
                <span>É isso que nos motiva e movimenta.</span>
                <h2>Somos uma produtora audiovisual <strong>que te leva aonde você merece estar.</strong></h2>
                <h2>Somos para aqueles que só se <strong>contentam com o melhor.</strong></h2>
                
            </div>

            <div class="home__sobre__content">
                <p><strong>Entregamos soluções audiovisuais criativas em diversos formatos</strong>: storytelling, lançamento em super lives, animação, branded content, institucionais, programas para internet e tv, e todo tipo de obra original.</p>
                    
                <p><strong>Somos um time de criativos e técnicos a serviço de quem quer alcançar o sucesso do jeito certo. Sabemos o que fazer e como fazer.</strong></p> 
                
                <p>Mais que vídeos, fazemos arte cinematográfica.</p>
                
                <p><strong>Somos Insigne.</strong></p>
            </div>
        </div>
    </div>

  

    <div class="home__beliefs">
        <div class="home__beliefs__wrapper">    
            <div class="home__beliefs__title">
                NÓS TE AJUDAMOS A SER NOTÁVEL
            </div>

            <div class="home__beliefs__content">
                <div class="home__beliefs__button">
                    ENTRAR EM CONTATO VIA WHATSAPP
                </div>
                <span>Horário de atendimento: das 08:00h às 17:00h</br>
            </div>
        </div>
    </div>


    <div class="home__brand">
        <h1>WE ARE INSIGNE</h1>
    </div>

<?php get_footer()?>
