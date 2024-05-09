$(function () {
    $('.btnInsert').on('click', function () {
        $('#modalTitle').html('Insert Student Data');
        $('.modal-footer button[type=submit]').html('Insert Data');
    });

    $('.btnEdit').on('click', function () {
        $('#modalTitle').html('Update Student Data');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.formAction').attr('action', 'http://localhost/learn-php-mvc/public/student/update');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/learn-php-mvc/public/student/getedit',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#npm').val(data.npm);
                $('#email').val(data.email);
                $('#major').val(data.major);
            }
        });
    });
});