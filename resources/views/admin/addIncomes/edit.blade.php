@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addIncome.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-incomes.update", [$addIncome->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.addIncome.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $addIncome->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addIncome.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_id">{{ trans('cruds.addIncome.fields.station') }}</label>
                <select class="form-control select2 {{ $errors->has('station') ? 'is-invalid' : '' }}" name="station_id" id="station_id" required>
                    @foreach($stations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('station_id') ? old('station_id') : $addIncome->station->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('station'))
                    <span class="text-danger">{{ $errors->first('station') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addIncome.fields.station_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.addIncome.fields.income_type') }}</label>
                <select class="form-control {{ $errors->has('income_type') ? 'is-invalid' : '' }}" name="income_type" id="income_type" required>
                    <option value disabled {{ old('income_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AddIncome::INCOME_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('income_type', $addIncome->income_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('income_type'))
                    <span class="text-danger">{{ $errors->first('income_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addIncome.fields.income_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.addIncome.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type" required>
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AddIncome::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', $addIncome->payment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addIncome.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="source_type_id">{{ trans('cruds.addIncome.fields.source_type') }}</label>
                <select class="form-control select2 {{ $errors->has('source_type') ? 'is-invalid' : '' }}" name="source_type_id" id="source_type_id" required>
                    @foreach($source_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('source_type_id') ? old('source_type_id') : $addIncome->source_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('source_type'))
                    <span class="text-danger">{{ $errors->first('source_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addIncome.fields.source_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.addIncome.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $addIncome->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addIncome.fields.date_helper') }}</span>
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