function NoProductInCart() {
    Swal.fire({
        title: 'Trong giỏ không có hàng bạn sẽ được chuyển đến shop',
        icon: 'info',
        confirmButtonColor: '#20b130',
        confirmButtonText: 'Ok come to Shop',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'index.php?action=Shop'
        }
    })
}

function UpdateItem() {
    Swal.fire({
        icon: 'success',
        title: 'Update Item',
        text: 'Cập nhật giỏ hàng thành công',
    })
}

function DeleteAll() {
    Swal.fire({
        title: 'Bạn có muốn xóa tất cả sản phẩm trong giỏ hàng?',
        text: "Bạn có thể thêm lại khi cần",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#20b130',
        cancelButtonColor: '#f20000',
        confirmButtonText: 'Yes, delete All!',
        cancelButtonText: "No, keep All",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted All !',
            )
            setTimeout(window.location = 'index.php?action=Cart&act=deleteAll', 3500)
        }
    })
}

function AskBeforeDelete(id) {
    Swal.fire({
        title: 'Bạn có muốn xóa sản phẩm?',
        text: "Bạn có thể thêm lại khi cần",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#20b130',
        cancelButtonColor: '#f20000',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: "No, I don't want delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted !',
            )
            setTimeout(window.location = 'index.php?action=Cart&act=detete_item&id=' + id, 3500)
        }
    })
}
