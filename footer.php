
<?php
// [0] Label, [1] https://www.link.com.br

$contatos = array(
    array("(11) 2338-0310", ""),
    array("Av. Professor Afonso Bovero, 1057 sl. 95", ""),
    array("São Paulo - SP", ""),
);

$socials = array(
    array("Instagram", "https://www.instagram.com/ofelipepavani/"),
    array("Facebook", "https://www.instagram.com/ofelipepavani/")
);

$filmes = array(
    array("Projeto 01", "https://www.instagram.com/ofelipepavani/"),
    array("Projeto 02", "https://www.instagram.com/ofelipepavani/"),
    array("Projeto 03", "https://www.instagram.com/ofelipepavani/"),
);

?>



<footer class="footer">
    <div class="footer__wrapper">
        <div class="footer__logo">

        </div>

        <div class="footer__content">
            <div class="footer__list">
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

        <div class="footer__list">
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

        <div class="footer__list">
            <strong>FILMES</strong>
            <ul>
                <?php foreach($filmes as $filme) {?>
                    <li>
                        <a href="<?php echo $filme[1]; ?>">
                            <?php echo $filme[0]; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>


        </div>
    </div>  
</footer>

</body>
    <?php wp_footer(); ?>
</html>