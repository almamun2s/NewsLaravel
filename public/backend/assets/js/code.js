// Sweet Alert

$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
});


document.addEventListener('DOMContentLoaded', function () {
    let formById = document.getElementById('deleteForm');

    if (formById != null) {
        formById.addEventListener('submit', function (event) {
            function_for_delete_notification(event, formById);
        });
    }

    let formByClass = document.querySelectorAll('.deleteForm');
    console.log(formByClass);
    formByClass.forEach(form => {
        form.addEventListener('submit', function (event) {
            function_for_delete_notification(event, form);
        });
    });

    function function_for_delete_notification(event, form) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
});