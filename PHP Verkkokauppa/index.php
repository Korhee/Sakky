<?php

session_start();
require("templates/header.php");
require("lib/db.php");


?>

<div class="frontPage container-sm bg-dark mt-3 p-4 text-light">
    <div class="row">
        <?php

        require("templates/nav.php");

        ?>

        <div class="col-md-6 text-center">
            <img src="templates/pics/retroPC.gif" class="computer img-thumbnail" alt="retroPC">
        </div>

        <div class="col-md-3 mt-3">
            <h5>Tervetuloa verkkokauppaani<br><br> 
                Oletko aina halunnut omistaa retro PC:n. 
                Nyt sinulla on mahdollisuus tilata old scool
                komponentteja ja rakentaa oma retro PC.</h5>
        </div>

    </div>

    <div class="container mt-4">
        <img src="templates/pics/korput.jpg" class="korput img-thumbnail mx-auto d-block" alt="korput">
    </div>

</div>

<?php

require("templates/footer.php");

?>