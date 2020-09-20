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

    <div class="home__clientes">
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
    </div>

    <div class="home__sobre">
        <div class="home__sobre__wrapper">    
            <div class="home__sobre__title">
                QUEM SOMOS
            </div>

            <div class="home__sobre__content">
                <h1>Lorem ipsum dolor sit amet, consectetur</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
    </div>

    <?php 
        $beliefs = array(
            array("01", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."),
            array("02", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."),
            array("03", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."),
            array("04", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."),
        );
    ?>

    <div class="home__beliefs">
        <div class="home__beliefs__wrapper">    
            <div class="home__beliefs__title">
                NOSSAS CRENÇAS
            </div>

            <div class="home__beliefs__content">
                <h1>Lorem ipsum dolor sit amet, consectetur</h1>
                <div class="home__beliefs__grid">
                    <?php foreach($beliefs as $belief){ 
                        $belief_number = $belief[0];
                        $belief_text = $belief[1];
                    ?>
                        <div class="home__beliefs__item">
                            <h2><?php echo $belief_number; ?></h2>
                            <p><?php echo $belief_text; ?></p>
                        </div>  
                    <?php } ?>
                </div>      
            </div>
        </div>
    </div>


    <div class="home__brand">

    </div>

<?php get_footer()?>
