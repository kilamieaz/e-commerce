@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Comment</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'comment-datatable',
            'route_name' => 'datatable.comment',
            'columns' => [
            ['header' => 'User'],
            ['header' => 'Product'],
            ['header' => 'Description'],
            ['header' => 'Value'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@component('components.modal', [
'modal_id' => 'input-comment-modal',
'modal_header' => 'Comment',
'inputs' => [
['name' => 'user_id', 'type' => 'select' , 'value' => $users, 'header' => 'Email', 'label_id' => 'comment_label_email'],
['name' => 'product_id', 'type' => 'select', 'value' => $products, 'header' => 'Product', 'label_id' =>
'comment_label_product'],
['name' => 'description', 'type' => 'text', 'value' => '', 'header' => 'Description', 'label_id' =>
'comment_label_description'],
['name' => 'value', 'type' => 'rating', 'value' => '', 'header' => 'Value', 'label_id' => 'comment_label_value'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#comment-datatable').DataTable();
        $('#input-comment-modal form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                if (save_method == "add") url = "{{ route('comment.store') }}";
                else url = "comment/" + id;
                if ($('#value option:selected').val() === $('#value option:selected').text()) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#input-comment-modal form').serialize(),
                        success: function (data) {
                            $('#input-comment-modal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function () {
                            alert("Error!");
                        }
                    });
                    return false;
                } else {
                    alert("You Can't");
                    return false;
                }
            }
        });
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#input-comment-modal').modal('show');
        $('#input-comment-modal form')[0].reset();
        $('.modal-title').text('Add Comment');
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-comment-modal form')[0].reset();
        $.ajax({
            url: "comment/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-comment-modal').modal('show');
                $('.modal-title').text('Edit Comment');
                $('#id_hidden').val(data.id);
                $('#user_id > option[value="' + data.user.id + '"]').prop('selected', true);
                $('#product_id > option[value="' + data.product.id + '"]').prop('selected', true);
                $('#description').val(data.description);
                $('#value > option[value="' + data.value + '"]').prop('selected', true);
            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "comment/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    $("#comment-datatable").DataTable().ajax.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush
