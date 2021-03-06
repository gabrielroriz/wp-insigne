<?php

$contatos = array(
    array("(11) 2338-0310", ""),
    array("Av. Professor Afonso Bovero, 1057 sl. 95", ""),
    array("São Paulo - SP", ""),
);

$socials = array(
    array("Instagram", "https://www.instagram.com/ofelipepavani/"),
    array("Facebook", "https://www.instagram.com/ofelipepavani/")
);

$filmesFooter = (new WP_Query([
    "post_type" => "filmes",
    "posts_per_page" => 3
]))->posts;

?>

<footer class="footer">
    <div class="footer__brand">
            <div class="footer__brand__container">
            <span>WE ARE INSIGNE<img src="<?php echo get_template_directory_uri() . "/assets/min-images/home/brand/pontilhado.png"; ?>" class="footer__brand__pontilhado" /></span>                    
        </div>
    </div>

    <div class="footer__access">
        <div class="footer__access__logo">
            <img src="<?php echo get_template_directory_uri() . "/assets/min-images/logos/insingeLogoAmarelo.svg"; ?>" alt=""/>
        </div>
        

        <div class="footer__access__content">
            <div class="footer__access__list">
                <strong>CONTATO</strong>
                <ul>
                    <?php foreach($contatos as $contato) {?>
                        <li>
                            <a href="<?php echo $contato[1]; ?>">
                                <?php echo $contato[0]; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        <div class="footer__access__list">
            <strong>REDES SOCIAIS</strong>
            <ul>
                <?php foreach($socials as $social) {?>
                    <li>
                        <a href="<?php echo $social[1]; ?>">
                            <?php echo $social[0]; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="footer__access__list">
            <strong>FILMES</strong>
            <ul>
                <?php foreach($filmesFooter as $filme) {?>
                    <li>
                        <a href="<?php echo $filme->guid; ?>">
                            <?php echo $filme->post_title; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>


        </div>
    </div>  

    <div class="footer__rights">
        © Todos os direitos reservados - Insigne
        <div class="footer__rights__links">
            <a>Políticas de Privacidade</a>
            <a>Termos de Uso</a>
            <a>Políticas de Cookies</a>
        </div>
    </div>
</footer>

</div>
</div>

</body>
    <?php wp_footer(); ?>
</html>