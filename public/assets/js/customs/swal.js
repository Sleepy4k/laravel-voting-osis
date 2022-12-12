// Success
$(document).ready(function() {
    $(document).on('click', '.success', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Berhasil',
            text: "Aksi berhasil dilakukan",
            icon: 'success',
        })
    });
});

// Information
$(document).ready(function() {
    $(document).on('click', '.information', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Information',
            text: "Aksi berhasil dilakukan",
            icon: 'info',
        })
    });
});

// Confirm Delete
$(document).ready(function() {
    $(document).on('click', '.confirm-delete', function (e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: 'Kamu akan menghapus data ini secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!',
            cancelButtonText: 'Batalkan'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).then((result) => {
                    if (result) {
                        form.submit();
                    }
                })
            }
        })
    });
});

// Confirm Edit
$(document).ready(function() {
    $(document).on('click', '.confirm-edit', function (e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Kamu akan mengubah data ini secara permanen!",
            icon: 'info',
            buttons: ["Cancel", "Yakin"],
        }).then((result) => {
            if (result) {
                Swal.fire({
                    title: 'Berhasil',
                    text: "Data berhasil terhapus",
                    icon: 'success',
                }).then((result) => {
                    if (result) {
                        form.submit();
                    }
                })
            }
        })
    });
});