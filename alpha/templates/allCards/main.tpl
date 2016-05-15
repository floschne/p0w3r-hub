<?php
/*
 * Data:
 * 'setData' -- Array
 *           Array(
 *               'setName',
 *               'releaseDate',
 *               'setSymbol' -- holds an img-Tag referring to the symbol images
 *           )
 */
 ?>
        <div class="w3-container w3-padding-hor-64" >
            <div id="cardInfo" class="w3-col w3-margin-right" style="width:20%">
                <div id="cardImg" class="w3-display-container w3-center">
                    <img src="gfx/card.jpg" alt="card demo" class="w3-round-large w3-card-8" style="width:75%">
                </div>
                <hr/>
                <div id="cardProperties" class="w3-container">

                </div>
            </div>
            <div id="cardList" class="w3-rest w3-card-8">
                <table class="w3-table w3-striped w3-hoverable w3-text-black">

                </table>
            </div>
        </div>

        <div id="allCardsProgressBarModal" class="w3-modal">
            <div class="w3-modal-content w3-card-8 w3-cyan">
                <h1>Loading..</h1>
                <div id="allCardsProgressBar" class="w3-progressbar w3-green" style="height: 20px"></div>
            </div>
        </div>