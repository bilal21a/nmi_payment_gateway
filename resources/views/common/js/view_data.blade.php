<script>
    function viewFormShow(id) {
        event.preventDefault();
        $('#myModal').modal('show');
        $('#modalTitle').html(view_title);
        $('#add_data_form').html('');
        url = show_form_url.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#edit_data_form').html(data);
            },
        });
    }
</script>
