@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addIncome.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-incomes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.id') }}
                        </th>
                        <td>
                            {{ $addIncome->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.amount') }}
                        </th>
                        <td>
                            {{ $addIncome->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.station') }}
                        </th>
                        <td>
                            {{ $addIncome->station->station ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.income_type') }}
                        </th>
                        <td>
                            {{ App\Models\AddIncome::INCOME_TYPE_SELECT[$addIncome->income_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Models\AddIncome::PAYMENT_TYPE_SELECT[$addIncome->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.source_type') }}
                        </th>
                        <td>
                            {{ $addIncome->source_type->source_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addIncome.fields.date') }}
                        </th>
                        <td>
                            {{ $addIncome->date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-incomes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection