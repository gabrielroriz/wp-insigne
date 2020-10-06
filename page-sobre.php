<?php get_header() ?>


<div class="sobre__header">
    <div class="sobre__header__wrapper">
        <div class="sobre__header__title">
            <h1>WE<span>ARE</span>INSIGNE</h1>
        </div>
        <div class="sobre__header__cta">
            <h4>
                E é nisso que acreditamos
            </h4>
            <a href="#sobre">﹀</a>
        </div>
    </div>
</div>


<div class="sobre__texto1">
    <div class="sobre__texto1__wrapper">
        <h2>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus ex quo commodi vero! 
        </h2>
        <h3>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus ex quo commodi vero! Esse sit consequuntur, repellendus aliquam accusamus dolore. 
        </h3>
        <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur vel tenetur cum nam rem inventore ipsam quos quia quaerat, consectetur accusamus vero recusandae repellendus cupiditate minima illo? Dolor, esse quod! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam non eius eveniet eum. Unde, adipisci corrupti? Dolorum quod voluptas reiciendis fugiat ipsam magni temporibus nobis eligendi iure veniam. Error, harum.
        </p>
    </div>
</div>


<div class="sobre__beliefs">
    <div class="sobre__beliefs__wrapper">
        <div class="sobre__beliefs__left" >
            <h3 class="sobre__beliefs__title">
            Nossas crenças
            </h3>
        </div>
        <div class="sobre__beliefs__right">

            <?php for($i = 1; $i < 4; $i++): ?>
                <div class="sobre__belief">
                    <div class="sobre__belief__number">
                        <?php echo "0".$i; ?>
                    </div>
                    <div class="sobre__belief__text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur quibusdam minus aliquam, voluptates blanditiis temporibus similique. Corporis quis explicabo consectetur velit quas ut animi ab minima libero, nisi maxime!
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>


<div class="sobre__grid">
    <div class="sobre__grid__wrapper">
        <div></div>

        <div class="sobre__grid__grid">
            <?php for($i = 4; $i < 13; $i++ ): ?>
                <div class="sobre__smallbelief">
                    <div class="sobre__smallbelief__number">
                    <?php echo $i;?>
                    </div>
                    <div class="sobre__smallbelief__text">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit tempore odit repellat vel, ea explicabo temporibus vero exercitationem provident ad sequi magni quae officiis in voluptatum sit, accusamus, optio necessitatibus.
                    </div>
                </div>
            <?php endfor; ?>
        </div>

    </div>
</div>


<?php get_footer() ?>