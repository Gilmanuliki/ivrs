@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.total.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.totals.update", [$total->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.total.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $total->total) }}" step="1" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.total.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.total.fields.category') }}</label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category" required>
                    <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Total::CATEGORY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $total->category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.total.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_id">{{ trans('cruds.total.fields.station') }}</label>
                <select class="form-control select2 {{ $errors->has('station') ? 'is-invalid' : '' }}" name="station_id" id="station_id" required>
                    @foreach($stations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('station_id') ? old('station_id') : $total->station->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('station'))
                    <span class="text-danger">{{ $errors->first('station') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.total.fields.station_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.total.fields.nationality') }}</label>
                <select class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality" id="nationality" required>
                    <option value disabled {{ old('nationality', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Total::NATIONALITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nationality', $total->nationality) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nationality'))
                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.total.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.total.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Total::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $total->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.total.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.total.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $total->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.total.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection