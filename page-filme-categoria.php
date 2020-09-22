<?php get_header() ?>

<div class="filmes__header">
    <div class="filmes__header__wrapper">
        
        <div class="filmes__header__title">
            <h1>
                Nossos filmes
            </h1>
            <h4>
                Subtítulo explicativo referente à página e ao quê o usuário encontrará.
            </h4>
        </div>

        <div class="filmes__header__posters">
            <img class="filmes__poster filmes__poster__1" src="https://via.placeholder.com/520x763" alt="Pôster 1">
            <img class="filmes__poster filmes__poster__2" src="https://via.placeholder.com/520x763" alt="Pôster 1">
            <img class="filmes__poster filmes__poster__3" src="https://via.placeholder.com/520x763" alt="Pôster 1">
            <img class="filmes__poster filmes__poster__fundo" src="https://via.placeholder.com/520x763" alt="">
        </div>
    </div>
</div>

<div class="filmes__tabs">
    <div class="filmes__tabs__wrapper">
        <a href="#" class="filmes__tabs__button filmes__tabs__selected" id="tab_todos_button">
            Todos os trabalhos
        </a>

        <a href="#" class="filmes__tabs__button" id="tab_tipo_button">
            Tipo de trabalho
        </a>
    </div>
</div>

<div class="filmes__tab" id="tab_todos">
    <?php for($i = 0; $i < 20; $i++): ?>
        <div class="filmes__poster">
        </div>
    <?php endfor; ?>
</div>

<div class="filmes__tab" id="tab_tipo">
    <div class="filmes__tab__wrapper">
    
            <div class="filmes__row">
                <div class="filmes__row__head">
                    <h3>Storytelling</h3>
                    <!-- <h4><a href="#">Veja todos</a></h4> -->
                </div>
                <div class="filmes__row__grid">
                    <?php for($i = 0; $i < 16; $i++): ?>
                        <div class="filmes__griditem">
                            <img src="https://via.placeholder.com/520x763">
                        </div>  
                    <?php endfor ?>
                </div>
            </div>

    </div>
</div>

</div>


<?php get_footer()?>