function AskBeforeDelete(id) {
    Swal.fire({
        title: 'Do you want delete this order',
        text: "You can't get it again",
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
            setTimeout(window.location = 'index.php?action=Product&act=deleteOrder&id=' + id, 3500)
        }
    }) 
}
function AskBeforeDeleteTemp(id) {
    Swal.fire({
        title: 'Do you want delete this order',
        text: "You can't get it again",
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
            setTimeout(window.location = 'index.php?action=Product&act=deleteOrderTemp&id=' + id, 3500)
        }
    }) 
}