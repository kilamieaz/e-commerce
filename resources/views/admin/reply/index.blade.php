@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Reply</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'reply-datatable',
            'route_name' => 'datatable.reply',
            'columns' => [
            ['header' => 'User'],
            ['header' => 'Product'],
            ['header' => 'Comment'],
            ['header' => 'Description'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@component('components.modal', [
'modal_id' => 'input-reply-modal',
'modal_header' => 'Reply',
'inputs' => [
['name' => 'user_id', 'type' => 'select' , 'value' => $users, 'header' => 'Email', 'label_id' => 'reply_label_email'],
// ['name' => 'product_id', 'type' => 'text', 'value' => '', 'header' => 'Product', 'label_id' => 'reply_label_product'],
['name' => 'comment_id', 'type' => 'select', 'value' => $comments, 'header' => 'Comment', 'label_id' => 'reply_label_comment'],
['name' => 'description', 'type' => 'text', 'value' => '', 'header' => 'Description', 'label_id' => 'reply_label_description'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#reply-datatable').DataTable();
        $('#input-reply-modal form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                if (save_method == "add") url = "{{ route('reply.store') }}";
                else url = "reply/" + id;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#input-reply-modal form').serialize(),
                    success: function (data) {
                        $('#input-reply-modal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function () {
                        alert("Error!");
                    }
                });
                return false;
            }
        });
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#input-reply-modal').modal('show');
        $('#input-reply-modal form')[0].reset();
        $('.modal-title').text('Add Reply');
        // $('#product_id').attr('disabled', 'disabled');
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-reply-modal form')[0].reset();
        $.ajax({
            url: "reply/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-reply-modal').modal('show');
                $('.modal-title').text('Edit Reply');
                $('#id_hidden').val(data.id);
                $('#user_id > option[value="'+ data.user.id +'"]').prop('selected', true);
                $('#comment_id > option[value="'+ data.comment.id +'"]').prop('selected', true);
                $('#description').val(data.description);
            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "reply/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    $("#reply-datatable").DataTable().ajax.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush
