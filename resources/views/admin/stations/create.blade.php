@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.station.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="station">{{ trans('cruds.station.fields.station') }}</label>
                <input class="form-control {{ $errors->has('station') ? 'is-invalid' : '' }}" type="text" name="station" id="station" value="{{ old('station', '') }}" required>
                @if($errors->has('station'))
                    <span class="text-danger">{{ $errors->first('station') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.station.fields.station_helper') }}</span>
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