<?php

require("templates/header.php");
require("lib/db.php");



?>

<div class="container-sm bg-dark mt-3 p-4 text-light text-center">

    <div class="row">

        <?php

        require("templates/nav.php");

        ?>

        <div class="col-4 ms-4 mb-3 text-start">
            <h2>PC Historiaa</h2>
            <br>

            <p>1970-luvun jälkeen ja 80-luvulla tietokoneet yleistyivät varsin nopeasti.
                Niiden koko pieneni myös huomattavasti, sillä suurimmatkin tietokoneet mahtuivat jo pöydälle,
                eivätkä ne enää vaatineet omaa huonettaan tai hallia toimiakseen.
                90-luvulla tietokoneista tuli nopeasti ihmisten työvälineitä monilla eri aloilla.
                Ihmisillä alkoi olla kodeissaan tietokoneita, joilla hoidettiin arkisia asioita,
                kuten kirjoitettiin tekstejä ja käytettiin taulukkolaskentaohjelmia taloudenhoidossa.
                Lisäksi myös internet alkoi yleistyä 1990-luvun loppupuolella.
                Vielä 80- ja 90-luvullakin tietokoneet olivat huomattavasti vaikeampia käyttää kuin nykytietokoneet.
                Piti osata monia insinööritaitoja, jotta pystyi käyttämään tietokonetta kunnolla.
                Monien ohjelmien asennukset tai tietokoneen käyttöönotto vaati erityisosaamista.
            </p>

        </div>
        
        <img src="templates/pics/computer-clip-art.jpg" class="cartoonPC ms-3 mt-4 img-thumbnail" alt="clip-art">

    </div>

</div>
<?php

require("templates/footer.php");

?>