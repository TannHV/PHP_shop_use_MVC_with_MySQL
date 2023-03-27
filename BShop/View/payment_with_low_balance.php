<link rel="stylesheet" href="./assets/css/payment.css">
<title>Payment</title>
<?php
$card = new CreditCard();
$cardname = '';
$cardnumber = '';
$cvv = '';
$card_error = '';

if (isset($_POST['Cardname'])) {
    $cardname = $_POST['Cardname'];
    $cardnumber = $_POST['Cardnumber'];
    $cvv = $_POST['CVV'];
    $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
    $getcard = $card->getCard($cardname, $cardnumber, $cvv);
    $balance_card = $getcard ? $getcard['Balance'] : 0;
    $id_card = $getcard ? $getcard['IdCard'] : -1;

    $gh = new giohang();
    $tong =  $gh->getTotal();

    if (!$getcard) {
        $card_error = "Credit card not found";
    } else {
        if ($balance_card < $tong) {
            $card_error = "Amount to pay is larger than your balance";
        }
    }
}

?>
<div class="container mt-5">
    <div class="payment">
        <div class="mb-4">
            <h2>Confirm order and pay</h2>
            <span>Please make the payment, after that you can enjoy all the features and benefits.</span>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="card p-3 text-white mb-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><strong>Product</strong></th>
                                <th><strong>Quantity</strong></th>
                                <th class="text-right"><strong>Total</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                                <tr>
                                    <td><?php echo $item['name'] ?> ( <?php echo $item['thoihan'] ?> )</td>
                                    <td class="text-center"><?php echo $item['soluong'] ?></td>
                                    <td class="text-right"><?php echo number_format($item['total'], 2) ?><u>đ</u></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <th colspan="2" class="text-right">Total</th>
                            <th class="text-right text-decoration-underline fst-italic">
                                <?php
                                $gh = new giohang();
                                $tong =  $gh->getTotal();
                                echo number_format($tong,2);
                                ?>đ
                            </th>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="p-3 rounded text-dark border border-danger" style="background-color: #f2ced3;">
                    <i class="bi bi-exclamation-octagon"></i> Your balance is not enough to pay, If you want to top up your balance
                    <a style="color: #18baf0;" class="text-decoration-underline" href="index.php?action=User&act=topup"><strong>Click here</strong></a>
                </div>
                <h3 class="pt-3">Or pay with your Credit Card</h3>
                <form method="post" action="index.php?action=Order&act=CreditCard">
                    <div class="card p-3">
                        <h6 class="text-uppercase">Card details</h6>
                        <div class="inputbox mt-3">
                            <input value="<?php echo $cardname ?>" type="text" name="Cardname" class="form-control" required>
                            <span>Name on card</span>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="inputbox mt-3 mr-2">
                                    <input value="<?php echo $cardnumber ?>" type="number" name="Cardnumber" class="form-control" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;">
                                    <i class="fa fa-credit-card"></i>
                                    <span>Card Number</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex flex-row">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $cvv ?>" type="number" name="CVV" class="form-control" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                        <span>CVV</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($card_error != '') :
                            echo '<div class="p-3 rounded text-light" style="background-color: #FF684C;"> <i class="bi bi-exclamation-octagon"></i> ' . $card_error . '</div>';
                        endif;
                        ?>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a href="index.php?action=Cart">Previous step</a>
                        <button class="btn btn-success px-3" type="submit" hidefocus="true">
                            Pay <?php
                                echo number_format($tong, 2);
                                ?>đ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>