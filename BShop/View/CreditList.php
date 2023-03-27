<title>List Creadit Card</title>
<div class="container mt-5">
    <h2>List Creadit Card</h2>
    <table class="table">
        <thead>
            <tr>
                <?php
                if (isset($_SESSION['vaitro'])) {
                    if ($_SESSION['vaitro'] == 1) {
                ?>
                        <th scope="col" class="fw-bold">ID Credit Card</th>
                <?php }
                } ?>

                <th scope="col" class="fw-bold">Name on Card</th>
                <th scope="col" class="fw-bold">Card Number</th>
                <th scope="col" class="fw-bold">CVV</th>
                <th scope="col" class="fw-bold">Balance</th>
                <?php
                if (isset($_SESSION['vaitro'])) {
                    if ($_SESSION['vaitro'] == 1) {
                ?>
                        <th scope="col" class="text-right fw-bold">Add Balance / Delete</th>
                <?php }
                } ?>
            </tr>
        </thead>
        <tbody class="table-group-divider table-divider-color">
            <?php
            $card = new creditcard();
            $result = $card->getListCard();
            while ($set = $result->fetch()) :
            ?>
                <tr>
                    <?php
                    if (isset($_SESSION['vaitro'])) {
                        if ($_SESSION['vaitro'] == 1) {
                    ?>
                            <th scope="row"  class="fw-bold"><?php echo $set['IdCard'] ?></th>
                    <?php }
                    } ?>
                    <td><?php echo $set['NameOnCard'] ?></td>
                    <td><?php echo number_format($set['CardNumber'], 0, '', ' ') ?></td>
                    <td><?php echo $set['CVV'] ?></td>
                    <td><?php echo  number_format($set['Balance'], 0, '', ',') ?> đ</td>
                    <?php
                    if (isset($_SESSION['vaitro'])) {
                        if ($_SESSION['vaitro'] == 1) {
                    ?>
                            <td class="text-right">
                                <div class="btn-group " role="group">
                                    <a class="btn btn-warning" href="index.php?action=CreditCard&act=Add_balance&id=<?php echo $set['IdCard'] ?>"><i class="bi bi-plus-circle-dotted"></i></a>
                                    <a class="btn btn-danger" href="index.php?action=CreditCard&act=delete&id=<?php echo $set['IdCard'] ?>"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                    <?php }
                    } ?>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>