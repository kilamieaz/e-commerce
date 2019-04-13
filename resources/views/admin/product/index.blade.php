@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'product-datatable',
            'route_name' => 'datatable.product',
            'columns' => [
            ['data' => 'name', 'name' => 'name', 'header' => 'Name'],
            ['data' => 'category', 'name' => 'category', 'header' => 'Category'],
            ['data' => 'description', 'name' => 'description', 'header' => 'Description'],
            ['data' => 'image', 'name' => 'image', 'header' => 'Image'],
            ['data' => 'price', 'name' => 'price', 'header' => 'Price'],
            ['data' => 'stock', 'name' => 'stock', 'header' => 'Stock'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@component('components.modal', [
'modal_id' => 'input-product-modal',
'modal_header' => 'Product',
'inputs' => [
['name' => 'name', 'type' => 'text' , 'value' => '', 'header' => 'Name', 'label_id' => 'product_label_name'],
['name' => 'category', 'type' => 'select' , 'value' => $categories, 'header' => 'Categories', 'label_id' => 'product_label_category'],
['name' => 'description', 'type' => 'text', 'value' => '', 'header' => 'Description', 'label_id' => 'product_label_description'],
['name' => 'image', 'type' => 'file', 'value' => '', 'header' => 'Image', 'label_id' => 'product_label_image'],
['name' => 'price', 'type' => 'number', 'value' => '', 'header' => 'price', 'label_id' => 'product_label_price'],
['name' => 'stock', 'type' => 'number', 'value' => '', 'header' => 'stock', 'label_id' => 'product_label_stock'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#product-datatable').DataTable();
        $('#input-product-modal form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                data = new FormData($("#input-product-modal form")[0]);
                if (save_method == "add") {
                    // url = "{{ route('product.store') }}";
                    url = "product"
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#input-product-modal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function () {
                            alert("Can't save data!");
                        }
                    });

                    return false;
                } else {
                    url = "product/" + id;
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        dataType: 'JSON',
                        async: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#input-product-modal').modal('hide');
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
        $('#input-product-modal').modal('show');
        $('#input-product-modal form')[0].reset();
        $('.modal-title').text('Add Product');
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-product-modal form')[0].reset();
        $.ajax({
            url: "product/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-product-modal').modal('show');
                $('.modal-title').text('Edit Product');
                $('#id_hidden').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
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
                url: "product/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    $("#product-datatable").DataTable().ajax.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush
