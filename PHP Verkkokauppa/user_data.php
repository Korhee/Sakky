<?php

require("templates/header.php");
require("lib/db.php");



?>

<div class="container-sm bg-dark mt-3 p-4 text-light text-center">
    
    <div class="row">

        <?php

        require("templates/nav.php");

        ?>

        <div class="col-3"></div>

        <div class="col-4 ms-5 mb-3 text-start">
            <h2>Tilaajan tiedot</h2>
            <form action="add_user.php" method="POST">

                <div class="mb-3 mt-5">
                    <label for="firstname">Etunimi</label>
                    <input type="firstname" class="form-control" id="firstname" placeholder="Etunimi" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="lastname">Sukunimi</label>
                    <input type="lastname" class="form-control" id="lastname" placeholder="Sukunimi" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="address">Osoite</label>
                    <input type="address" class="form-control" id="address" placeholder="Osoite" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="city">Kaupunki</label>
                    <input type="city" class="form-control" id="city" placeholder="Kaupunki" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="zip">Postinumero</label>
                    <input type="zip" class="form-control" id="zip" placeholder="Postinumero" name="zip" required>
                </div>
                <div class="mb-3">
                    <label for="phone">Puhelinnumero</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Puh" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="email">Sähköposti</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message">Viesti kenttä</label>
                    <textarea cols="60" rows="6" class="form-control" id="message" placeholder="Viesti myyjälle" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tilaa</button>
            </form>
        </div>





    </div>

</div>
<?php

require("templates/footer.php");

?>