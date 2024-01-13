<?php

require("templates/header.php");
require("lib/db.php");

?>

<div class="cart container-sm bg-dark mt-3 p-4 text-light">
  <div class="row">
  
    <?php

    require("templates/nav.php");

    ?>

    <div class="col-9 mt-3">

      <h3>Ostoskori:</h3>

      <table class="table table-dark table-striped mt-3 text-light">
        <thead>
          <tr>
            <th>Nimi:</th>
            <th>Kuvaus:</th>
            <th>Hinta:</th>
            <th>alv:</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $result = $sql->query("SELECT * FROM cart WHERE sessionid = '" . session_id() . "'");
          while ($row = $result->fetch_assoc()) {
            $result_product = $sql->query("SELECT * FROM products WHERE id = '" . $row['product'] . "'");
            $row_product = $result_product->fetch_assoc();

            // Poistaa tuotteen ostoskorista
            if (isset($_GET['deleteid'])) {
              $id = $_GET['deleteid'];
              $delete = $sql->query("DELETE FROM cart WHERE id = '" . $id . "'");
              header("Location: cart.php");
            }

            echo
            "<tr>
              <td> " . $row_product['name'] . "</td>
              <td> " . $row_product['description'] . "</td>
              <td> " . $row_product['price'] . "</td>
              <td> " . $row_product['tax'] . "</td>
              <td> <a href='?deleteid=" . $row['id'] . "'><i class='bi bi-trash3'></i></a></td>
            </tr>";

            // Hakee kaikkien tuotteiden hinnat.
            $total_price += $row_product['price'];
          }

          ?>


        </tbody>
      </table>

      <br>

      <div class="col-md-2 mt-2 float-end">
        <div class="cart-total">
          <strong class="cart-total-title">Total</strong>
          <span class="cart-total-price"> € <?php echo $total_price; ?></span>
        </div>
      </div>
      
      <a class="btn btn-light float-end me-3" href="user_data.php">Tilaa</a>
      <a class="btn btn-danger float-end me-3" href="empty_cart.php">Tyhjennä ostoskori</a>

    </div>



    
  </div>

</div>

<?php

require("templates/footer.php");

?>