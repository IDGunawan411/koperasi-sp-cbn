(function($) {

    $(document).ready(function() {
        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    swal({
                        title: "Deleted",
                        text: "The list item has been deleted!",
                        icon: "success",
                    });
                    document.location.href = href;
                } else {
                    swal("The item is not deleted!");
                }
            });
        })
        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            Swal.fire({
                type: 'success',
                title: 'Success',
                text: 'Record has been deleted!'
            })
        }
    })
})(jQuery);