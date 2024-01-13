<?php

session_start();
require("templates/header.php");
require("lib/db.php");


// Hakee asiakkaan tiedot viimeisimmän ID:n mukaan
//$newUser = $sql->query = "SELECT * FROM customer WHERE id =" . $_SESSION['id'];
//$tilaaja = $sql->query($newUser);

$newUser = $_SESSION['käyttäjä'];
$order_id = $_SESSION['käyttäjä'];
$customer_id = $_SESSION['käyttäjä'];

$result = $sql->query("SELECT * FROM customer WHERE id = '" . $newUser . "'");
$tilaaja = $result->fetch_assoc();


?>

<div class="container-sm bg-dark mt-3 p-4 text-light">
    <div class="row">



        <div class="col-9 mt-3 ms-4">
            <h4>Kiitos tilauksesta <?php echo $tilaaja['firstname'] ?></h4>

            <ul class="list-group ms-4">

                <?php



                $result_cart = $sql->query("SELECT * FROM cart WHERE sessionid = '" . session_id() . "'");
                while ($kori = $result_cart->fetch_assoc()) {
                    $result_product = $sql->query("SELECT * FROM products WHERE id = '" . $kori['product'] . "'");
                    $tuote = $result_product->fetch_assoc();

                    echo
                    "<li> " . $tuote['name'] . ' -' . $tuote['price'] . ' €' .   "</li>";
                }
                ?>

            </ul>
            <br>
            <p>Saat vielä varausvahvistuksen sähköpostilla.</p>

            <?php

            $date = date('d-m-y');

            // Lähettää varausvahvistus sähköpostin asiakkaalle.
            $to .= $tilaaja['email'];
            $subject = "Kiitos tilauksesta verkkokaupastamme";
            $message .= "Kiitos tilauksesta " . $tilaaja['firstname'] . " " . $tilaaja['lastname'] . ".\n" .
                "Tilauspäivämäärä "  . $date . ".\n" .
                "Tilaamasi tuotteet" . ".\n";


            $result_cart = $sql->query("SELECT * FROM cart WHERE sessionid = '" . session_id() . "'");
            while ($kori = $result_cart->fetch_assoc()) {
                $result_product = $sql->query("SELECT * FROM products WHERE id = '" . $kori['product'] . "'");
                $tuote = $result_product->fetch_assoc();

                // Lisää tilatut tuotetiedot order_items tauluun
                $sql->query("INSERT INTO order_items (order_id, product_id, name, price, createdate) 
            VALUES ('" . $order_id . "', '" . $tuote['id'] . "', '" . $tuote['name'] . "', '" . $tuote['price'] . "', '" . $date . "')");


                $message .= "-" . $tuote['name'] . ".\n";
                $total_price += $tuote['price'];
            }
            $message .= "\nTilauksen kokonaishinta = " . $total_price . "€.";

            mail($to, $subject, $message);

            // Lisää käyttäjän tiedot orders tauluun
            $sql->query("INSERT INTO orders (customer_id, createdate, finishdate, price) 
            VALUES ('$customer_id ', NOW(), NOW(), '" . $total_price . "')");



            //Tyhjentää ostoskorin
            $empty_cart = "DELETE FROM cart";

            $sql->query($empty_cart);


            ?>

            <a class="btn btn-light mt-4" href="index.php">Palaa etusivulle</a>

        </div>

    </div>


    <img src="templates/pics/happy_pc.png" class="happyPC ms-4 mt-3 md-3 img-thumbnail" alt="happy-computer">


</div>

<?php

require("templates/footer.php");

?>