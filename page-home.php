<?php get_header() ?>

    <?php 
        $home_title = "\"Bravo\" é o mínimo.";
    ?>
    <div class="home__container">

        <div class="home__wrapper">

            <div class="home__header">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/header/headerBottomPath.svg"; ?>" class="home__header__bottom-path" />
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/header/headerDivisoriaMobile.svg"; ?>" class="home__header__bottom-path--mobile" />
                <div class="home__header__title"><?php echo $home_title; ?></div>
            </div>

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

            <div class="home__sobre">
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

                <div class="home__sobre__wrapper">    
                    <div class="home__sobre__title">
                        <span>É isso que nos motiva e movimenta.</span>
                        <h2>Somos uma produtora audiovisual <strong>que te leva aonde você merece estar.</strong></h2>
                        <h2>Somos para aqueles que só se <strong>contentam com o melhor.</strong></h2>
                        
                    </div>

                    <div class="home__sobre__content">
                        <!-- <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/sobre/sobreMobileDivisoriaTop.svg"; ?>" class="home__sobre__content__divisoria home__sobre__content__divisoria--top" /> -->
                        <p><strong>Entregamos soluções audiovisuais criativas em diversos formatos</strong>: storytelling, lançamento em super lives, animação, branded content, institucionais, programas para internet e tv, e todo tipo de obra original.</p>
                            
                        <p><strong>Somos um time de criativos e técnicos a serviço de quem quer alcançar o sucesso do jeito certo. Sabemos o que fazer e como fazer.</strong></p> 
                        
                        <p>Mais que vídeos, fazemos arte cinematográfica.</p>
                        
                        <p><strong>Somos Insigne.</strong></p>
                        <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/sobre/sobreMobileDivisoriaBottom.svg"; ?>" class="home__sobre__content__divisoria home__sobre__content__divisoria--bottom" />
                    </div>
                </div>
            </div>

        

            <div class="home__cta">
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/cta/mobileBGTop.svg"; ?>" class="home__cta__divisoria home__cta__divisoria--top" />
                <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/cta/mobileBGBottom.svg"; ?>" class="home__cta__divisoria home__cta__divisoria--bottom" />
                <div class="home__cta__wrapper">    
                    <div class="home__cta__title">
                        Nós te ajudamos a ser notável.
                    </div>

                    <div class="home__cta__content">
                        <div class="home__cta__button">
                            ENTRAR EM CONTATO VIA WHATSAPP
                        </div>
                        <span>Horário de atendimento: das 08:00h às 17:00h</br>
                    </div>
                </div>
            </div>


            <div class="home__brand">
                <div class="home__brand__container">
                    <span>
                        WE ARE INSIGNE
                        <img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/brand/pontilhado.png"; ?>" class="home__brand__pontilhado" />
                    </span>
                    
                </div>
                
            </div>

        <?php get_footer()?>

    </div>
</div>
