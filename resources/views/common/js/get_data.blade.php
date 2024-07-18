<script>
    $(function() {
            var dynamicObjectArray = tabelDataArray.map(function(item) {
                return {
                    data: item,
                    name: item
                };
            });
            dataTable =
                $('#datatable').dataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: get_data_url,
                    aaSorting: [
                        [0, "desc"]
                    ],
                    columns: dynamicObjectArray
                });
        });
</script>