<?php get_header() ?>

<script>
    // const instagramAccount = "<?php echo customizer_get_value("social", "all", "ig-user"); ?>";
    const instagramAccount = "<?php echo "ofelipepavani"; ?>";
</script>

<div class="contato">
    <div class="contato__navbar-area"></div>


    <div class="contato__header">
        <div class="contato__header__left-background">
            <div class="contato__header__left-background__content">
                <h1>
                    <strong>Entre em<br/>
                    contato<br/></strong>
                    com nossa<br/>
                    equipe.
                </h1>
            </div>
        </div>
        <img 
            class="contato__header__right-background" 
            src="<?php echo get_template_directory_uri() . "/assets/min-images/contato/office.png"; ?>" 
        />

    </div>

    <div class="contato__infos">
        <div class="contato__infos__container">
            <div class="contato__infos__number">
                <h2>
                    01
                    <div class="contato__infos__number__line"></div>
                </h2>
             
            </div>
            <div class="contato__infos__infos">


                <div class="contato__infos__row">
                    <h4>Endereço</h4>
                    <h2>
                        Av. Professor Alfonso Bovero, 1057.
                    </h2>
                </div>


                <div class="contato__infos__row">
                    <h4>Telefone</h4>
                    <h2>
                        +55 (11) 4502-4718
                    </h2>
                </div>


                <div class="contato__infos__row">
                    <h4>Redes sociais</h4>
                    <div class="contato__infos__social">
                        <a href="#">Instagram</a>
                        <a href="#">Facebook</a>
                        <a href="#">YouTube</a>
                    </div>
                </div>

                <div class="contato__infos__row">
                    <div class="contato__infos__wpp">
                        <a href="#">
                            Whatsapp
                        </a>    
                    </div>
                    <div class="contato__infos__smalltext">
                        Horário de atendimento:<br/>
                        das 08:00h às 17:00h
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php 

        $instagram_posts = array(
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
            "https://img.elo7.com.br/product/zoom/2553EAF/post-para-instagram-redes-sociais.jpg",
        );
    ?>

    <div class="contato__instagram">
        <div class="contato__instagram__container">
            <div class="contato__instagram__number">
                <h2>
                    02
                    <div class="contato__instagram__number__line"></div>
                </h2>
            </div>
            <div class="contato__instagram__posts">
                <h3>NOSSO INSTAGRAM</h3>

                <div class="contato__instagram__posts__cards" id="contato__instagram__posts__cards">
                <!-- <?php for ($i = 0; $i < count($instagram_posts); $i++) { ?>
                    <?php if($i % 3 == 0) { ?> <div class="contato__instagram__posts__cards__line"> <?php } ?>
                        <img src=<?php echo $instagram_posts[$i]; ?> />
                    <?php if(($i + 1) % 3 == 0 || $i == count($instagram_posts) - 1) { ?> </div> <?php } ?>
                <?php } ?> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>