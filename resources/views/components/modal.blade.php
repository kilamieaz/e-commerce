<div class="modal fade modal" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @component('components.form')
            @slot('input')
            @foreach($inputs as $input)
            @if ($input['type'] == 'text' || $input['type'] == 'number' || $input['type'] == 'password' || $input['type'] == 'file')
            <div class="form-group">
                <label for="{{ $input['name'] }}" class="col-form-label"
                    id="{{ $input['label_id'] }}">{{ $input['header'] }}</label>
                <input type="{{ $input['type'] }}" class="form-control" id="{{ $input['name'] }}"
                    name="{{ $input['name'] }}">
            </div>
            @elseif($input['type'] == 'select')
            <div class="form-group">
                <label for="{{ $input['name'] }}" id="{{ $input['label_id'] }}">{{ $input['header'] }}</label>
                <select class="form-control" id="{{ $input['name'] }}" name="{{ $input['name'] }}">
                    @foreach ($input['value'] as $item)
                        <option value="{{ $item->selectValue() }}">{{ $item->selectText() }}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="form-group">
            <label for="{{ $input['name'] }}" id="{{ $input['label_id'] }}">{{ $input['header'] }}</label>
            <select class="form-control" id="{{ $input['name'] }}" name="{{ $input['name'] }}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
            </select>
            </div>
            @endif
            @endforeach
            @endslot
            @endcomponent
        </div>
    </div>
</div>
