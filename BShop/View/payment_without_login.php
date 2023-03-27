<link rel="stylesheet" href="./assets/css/payment.css">
<title>Payment</title>
<?php
$card = new CreditCard();
$cardname = '';
$cardnumber = '';
$cvv = '';
$card_error = '';

$username = '';
$email = '';
$numberphone = '';
$address = '';
$user_error  = '';

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

    $us = new User();
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $numberphone = $_POST['NumberPhone'];
    $address = $_POST['Address'];

    $checkEmail = $us->ExistUser($email);
    $checkDt = $us->ExistUserDt($numberphone);

    if ($checkEmail) {
        $user_error  = 'Your email has been registered, please use another Email or ';
    }
    if ($checkDt) {
        $user_error  = 'Your numberphone has been registered, please use another numberphone or ';
    }
    if ($checkDt && $checkEmail) {
        $user_error = 'Your email and numberphone has been registered, please use another Email and numberphone or ';
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
                            <th colspan="2" class="text-right fw-bold">Total</th>
                            <th class="text-right text-decoration-underline fst-italic">
                                <?php
                                $gh = new giohang();
                                $tong =  $gh->getTotal();
                                echo number_format($tong, 2);
                                ?>đ
                            </th>
                        </tfoot>
                    </table>
                </div>
                <h6 class="pt-2" style="color: #393f81;">You have an account? <a href="index.php?action=User&act=login" style="color: blue;">Login here</a></h6>
                <h6 class="pb-2" style="color: #393f81;">Don't have an account? <a href="index.php?action=User&act=sign-up" style="color: red;">Register here</a></h6>
            </div>
            <div class="col-lg-7 col-md-12">
                <form method="post" action="index.php?action=Order&act=CreditCard">
                    <div class="card p-3">
                        <h6 class="text-uppercase">Payment details</h6>
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
                        <div class="mt-4 mb-4">
                            <h6 class="text-uppercase">Information User</h6>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $username ?>" type="text" name="Username" class="form-control" required>
                                        <span>Name</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $email ?>" type="text" name="Email" class="form-control" required>
                                        <span>Email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $numberphone ?>" type="number" name="NumberPhone" class="form-control" required onKeyPress="if(this.value.length==11) return false;">
                                        <span>Your Phone</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $address ?>" type="text" name="Address" class="form-control" required>
                                        <span>Address</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($user_error  != '') :
                            echo '<div class="p-3 rounded text-light" style="background-color: #FF684C;"> <i class="bi bi-exclamation-octagon"></i> ' . $user_error  . '<a href="index.php?action=User&act=login">log in</a> to continue paying</div>';
                        endif;
                        ?>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a href="index.php?action=Cart">Previous step</a>
                        <button class="btn btn-success px-3" type="submit">
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