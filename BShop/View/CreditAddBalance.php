<link rel="stylesheet" href="./assets/css/payment.css">
<title>Creadit Card Add Balance</title>
<?php

?>
<div class="container mt-5">
    <div class="payment">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-danger"> Add balance Credit Card</h3>
                <?php
                if (isset($_SESSION['vaitro'])) {
                    if ($_SESSION['vaitro'] == 1) {
                        if (isset($_GET['id'])) {
                            $idcard = $_GET['id'];
                            $card  = new CreditCard();
                            $set = $card->getCardwithID($idcard);
                ?>
                            <form method="post" action="index.php?action=CreditCard&act=Add_balance">
                                <div class="card p-3">
                                    <h6 class="text-uppercase">Credit Card Information</h6>
                                    <table class="table">
                                        <thead>
                                            <tr class="table-dark fw-bold fs-4">
                                                <th scope="col">Name on Card</th>
                                                <th scope="col">Number on Card</th>
                                                <th scope="col">CVV</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="table-info fs-5">
                                                <th scope="row"> <?php echo $set['NameOnCard'] ?> </th>
                                                <td> <?php echo $set['CardNumber'] ?> </td>
                                                <td> <?php echo $set['CVV'] ?> </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <input type="hidden" name="idcard" value="<?php echo $idcard ?>">
                                    <div class="inputbox mt-3">
                                        <input value="<?php echo $balance ?>" type="number" name="balance" class="form-control " min="200000" required>
                                        <span>Add Balance</span>
                                    </div>
                                    <small class="text-danger ">( * ) Currency is VND (đ)</small>
                                </div>
                                <div class="mt-4 mb-4 text-right">
                                    <button class="btn btn-success px-3 w-25" type="submit">Add Balance</button>
                                </div>
                            </form>
                <?php
                        }
                    } else {
                        echo '<h2 class="text-danger text-center"> You do not have access rights</h2>';
                    }
                } else {
                    echo '<h2 class="text-danger text-center"> You do not have access rights</h2>';
                }
                ?>
            </div>
        </div>
    </div>
</div>