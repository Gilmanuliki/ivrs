@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.total.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.totals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.id') }}
                        </th>
                        <td>
                            {{ $total->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.total') }}
                        </th>
                        <td>
                            {{ $total->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\Total::CATEGORY_SELECT[$total->category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.station') }}
                        </th>
                        <td>
                            {{ $total->station->station ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.nationality') }}
                        </th>
                        <td>
                            {{ App\Models\Total::NATIONALITY_SELECT[$total->nationality] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Total::GENDER_SELECT[$total->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.total.fields.date') }}
                        </th>
                        <td>
                            {{ $total->date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.totals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection