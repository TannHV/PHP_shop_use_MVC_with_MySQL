<link rel="stylesheet" href="./assets/css/payment.css">
<title>Creadit Create Card</title>
<?php
$cardname  = '';
$cardnumber = '';
$cvv  = '';
$balance = '';
$cardnumber_error = '';
$cvv_error  = '';
$balance_error = '';
if (isset($_POST['cardname'])) {
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $cvv  = $_POST['cvv'];
    $balance = $_POST['balance'];
    $card = new Creditcard();
    $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));

    if (strlen($cardnumber) != 16) {
        $cardnumber_error = 'CardNumber consists of only 16 numbers';
    }
    if (strlen($cvv) != 6) {
        $cvv_error = 'CVV number consists of only 6 numbers';
    }

    if ($balance < 200000) {
        $balance_error = 'Balance needs to be more than 200,000 đ';
    }
}
?>
<div class="container mt-5">
    <div class="payment">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-danger"> Add new Credit Card</h3>
                <?php
                if (isset($_SESSION['vaitro'])) {
                    if ($_SESSION['vaitro'] == 1) {
                ?>
                        <form method="post" action="index.php?action=CreditCard&act=create">
                            <div class="card p-3">
                                <h6 class="text-uppercase">Credit Card Information</h6>
                                <div class="inputbox mt-3">
                                    <input type="text" name="cardname" class="form-control" value="<?php echo $cardname ?>" required>
                                    <span>Name on card</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2">
                                            <input value="<?php echo $cardnumber ?>"type="number" name="cardnumber" class="form-control <?php echo $cardnumber_error != '' ? 'error-input' : '' ?>" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;">
                                            <i class="fa fa-credit-card"></i>
                                            <span>Card Number</span>
                                            <?php
                                            if ($cardnumber_error != '') {
                                                echo '<small class="text-danger mt-0 pt-0">' . $cardnumber_error . '</small>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-row">
                                            <div class="inputbox mt-3 mr-2">
                                                <input value="<?php echo $cvv ?>" type="number" name="cvv" class="form-control <?php echo $cvv_error != '' ? 'error-input' : '' ?>" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                                <span>CVV</span>
                                            </div>
                                        </div>
                                        <?php
                                        if ($cvv_error != '') {
                                            echo '<small class="text-danger mt-0 pt-0">' . $cvv_error . '</small>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="inputbox mt-3">
                                    <input value="<?php echo $balance ?>" type="number" name="balance" class="form-control <?php echo $balance_error != '' ? 'error-input' : '' ?>" min="200000" required>
                                    <span>Balance Card</span>
                                </div>
                                <?php
                                if ($balance_error != '') {
                                    echo '<small class="text-danger mt-0 pt-0">' . $balance_error . '</small>';
                                }   
                                ?>
                                <small class="text-danger ">( * ) Currency is VND (đ)</small>
                            </div>
                            <div class="mt-4 mb-4 text-right">
                                <button class="btn btn-success px-3 w-25" type="submit">Create Card</button>
                            </div>
                        </form>
                <?php
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