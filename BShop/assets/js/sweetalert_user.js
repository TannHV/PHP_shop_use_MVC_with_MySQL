function DeleteAllitemWishList(makh) {
    Swal.fire({
        title: 'Bạn có muốn xóa tất cả sản phẩm trong danh sách yêu thích?',
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
            setTimeout(window.location = 'index.php?action=User&act=wishlist&do=DeleteAll&id=' + makh, 3500)
        }
    })
}

function AskBeforeDelete(makh, mahh) {
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
            setTimeout(window.location = 'index.php?action=User&act=wishlist&do=DeleteItem&id=' + makh + '&item=' + mahh, 3500)
        }
    })
}