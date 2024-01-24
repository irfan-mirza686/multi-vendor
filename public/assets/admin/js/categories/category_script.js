$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    showCategorysList();

    function showCategorysList() {

        var table = $('.category-table').DataTable({

            "ajax": {
                "url": '/admin/categories/list',
                "dataType": "json",

                "type": "POST"
                // "contentType": "application/json; charset=utf-8"
            },
            processing: true,
            serverSide: true,
            stateSave: true,
            "bDestroy": true,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'image', name: 'image' },
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'parent_category', name: 'parent_category' },
                { data: 'is_featured', name: 'is_featured' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....

});
