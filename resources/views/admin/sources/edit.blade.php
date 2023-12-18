@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.source.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sources.update", [$source->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="source_type">{{ trans('cruds.source.fields.source_type') }}</label>
                <input class="form-control {{ $errors->has('source_type') ? 'is-invalid' : '' }}" type="text" name="source_type" id="source_type" value="{{ old('source_type', $source->source_type) }}" required>
                @if($errors->has('source_type'))
                    <span class="text-danger">{{ $errors->first('source_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.source.fields.source_type_helper') }}</span>
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