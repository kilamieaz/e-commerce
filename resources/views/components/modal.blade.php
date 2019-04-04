<div class="modal fade modal" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @component('components.form')
            @slot('input')
            @foreach($inputs as $input)
            <div class="form-group">
                <label for="{{ $input['name'] }}" class="col-form-label">{{ $input['header'] }}</label>
                <input type="{{ $input['type'] }}" class="form-control" name="{{ $input['name'] }}">
            </div>
            @endforeach
            @endslot
            @endcomponent
        </div>
    </div>
</div>
