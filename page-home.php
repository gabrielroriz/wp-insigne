<?php get_header() ?>

    <div class="home__header">

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

    <div class="home__projetos">
        <div class="home__projetos__wrapper">
            <div class="home__projetos__grid">
                <?php foreach($projetos as $projeto) {
                    $projeto__title = $projeto[0];
                    $projeto__description = $projeto[1];
                ?>
                <div class="home__projetos__grid__item">
                    <div class="home__projetos__grid__item__content">
                        <h2><?php echo $projeto__title; ?></h2>
                        <p><?php echo $projeto__description; ?></p>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>  

    </div>

<?php get_footer()?>
