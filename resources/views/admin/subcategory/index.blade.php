@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sub Category</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'sub-category-datatable',
            'route_name' => 'datatable.subcategory',
            'columns' => [
            ['header' => 'Name'],
            ['header' => 'Category'],
            ['header' => 'Description'],
            ['header' => 'Image'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@component('components.modal', [
'modal_id' => 'input-sub-category-modal',
'modal_header' => 'Sub Category',
'inputs' => [
['name' => 'name', 'type' => 'text' , 'value' => '', 'header' => 'Name', 'label_id' => 'sub_category_label_name'],
['name' => 'parent_id', 'type' => 'select' , 'value' => $categories, 'header' => 'Category', 'label_id' => 'sub_category_label_name'],
['name' => 'description', 'type' => 'text', 'value' => '', 'header' => 'Description', 'label_id' =>
'sub_category_label_description'],
['name' => 'image', 'type' => 'file', 'value' => '', 'header' => 'Image', 'label_id' => 'sub_category_label_image'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#sub-category-datatable').DataTable();
        $('#input-sub-category-modal form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                data = new FormData($("#input-sub-category-modal form")[0]);
                if (save_method == "add") {
                    url = "{{ route('subcategory.store') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#input-sub-category-modal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function () {
                            alert("Tidak dapat menyimpan data!");
                        }
                    });

                    return false;
                } else {
                    url = "subcategory/" + id;
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        dataType: 'JSON',
                        async: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#input-sub-category-modal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function () {
                            alert("Error!");
                        }
                    });
                    return false;
                }
            }
        });
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#input-sub-category-modal').modal('show');
        $('#input-sub-category-modal form')[0].reset();
        $('.modal-title').text('Add Sub Category');
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-sub-category-modal form')[0].reset();
        $.ajax({
            url: "subcategory/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-sub-category-modal').modal('show');
                $('.modal-title').text('Edit Sub Category');
                $('#id_hidden').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#parent_id > option[value="'+ data.parent_id +'"]').prop('selected', true);
                // $('#image').val(data.image);
            },
            error: function () {
                alert("Error");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "subcategory/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    $("#sub-category-datatable").DataTable().ajax.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush
