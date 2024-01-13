<?php

require("templates/header.php");
require("lib/db.php");


?>

<div class="container-sm bg-dark mt-3 p-4 text-light">
    <div class="row">

        <?php

        require("templates/nav.php");

        ?>

        <div class="col-md-9 pe-5">
            <div class="products">
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nimi</th>
                            <th>Kuvaus</th>
                            <th>Hinta</th>
                            <th>Alv.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $sql->query("SELECT * FROM products");
                        while ($row = $result->fetch_assoc()) : ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['price']; ?> €</td>
                                <td><?php echo $row['tax']; ?></td>
                                <td><img src="templates/pics/<?php echo $row['image']; ?>" style="width:200px;height=200px;"></td>
                                <td><a class="button btn btn-light mt-5" href="add_to_cart.php?ostoskori=<?php echo $row['id']; ?>"><span><i class="bi bi-cart3"></i>-Lisää</a></td></span>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>



    </div>

</div>

<?php

require("templates/footer.php");

?>