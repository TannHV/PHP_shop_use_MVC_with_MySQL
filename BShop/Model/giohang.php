<?php
class giohang
{
    function add_item($key, $quantity)
    {
        $quantity = $quantity == 0 ? 1 : $quantity;
        $key_session = '';
        if (isset($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key2 => $item) {
                if ($key == $item['mahh']) {
                    $key_session = $key2;
                }
            }

            if (isset($_SESSION['cart'][$key_session])) {
                $quantitynew = $quantity + $_SESSION['cart'][$key_session]['soluong'];
                $this->Update($key_session, $quantitynew);
            }

            if ($key_session == '') {
                $pros = new hanghoa();
                $pro = $pros->getProductDetails($key);
                $mahh = $pro['mahh'];
                $tenhh = $pro['tenhh'];
                $hinh  = $pro['hinh'];
                $cost = $pro['dongia'];
                $thoihan = $pro['thoihan'];
                $giamgia = $pro['giamgia'];
                $total  = $giamgia == 0 ? ($cost * $quantity) : ($giamgia * $quantity);

                $item = array(
                    'mahh' => $mahh,
                    'hinh' => $hinh,
                    'name' => $tenhh,
                    'thoihan' => $thoihan,
                    'dongia' => $cost,
                    'giamgia' => $giamgia,
                    'soluong' => $quantity,
                    'total' => $total
                );
                $_SESSION['cart'][] = $item;
            }
        }
    }

    function getTotal()
    {
        $total  = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['total'];
        }
        return $total;
    }
    function Remove($key)
    {
        unset($_SESSION['cart'][$key]);
    }

    function deleteAll()
    {
        foreach ($_SESSION['cart'] as $key => $item) {
            unset($_SESSION['cart'][$key]);
        }
    }
    function CartTotal()
    {
        return count($_SESSION['cart']);
    }

    function Update($key, $qty)
    {
        if ($qty == 0) {
            $this->Remove($key);
        } else {
            $_SESSION['cart'][$key]['soluong'] = $qty;

            $_SESSION['cart'][$key]['total'] = $_SESSION['cart'][$key]['giamgia'] > 0 ? $_SESSION['cart'][$key]['giamgia'] * $_SESSION['cart'][$key]['soluong'] : $_SESSION['cart'][$key]['dongia'] * $_SESSION['cart'][$key]['soluong'];
        }
    }
}
