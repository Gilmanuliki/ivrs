@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.station.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.station.fields.id') }}
                        </th>
                        <td>
                            {{ $station->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.station.fields.station') }}
                        </th>
                        <td>
                            {{ $station->station }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#station_totals" role="tab" data-toggle="tab">
                {{ trans('cruds.total.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#station_add_incomes" role="tab" data-toggle="tab">
                {{ trans('cruds.addIncome.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="station_totals">
            @includeIf('admin.stations.relationships.stationTotals', ['totals' => $station->stationTotals])
        </div>
        <div class="tab-pane" role="tabpanel" id="station_add_incomes">
            @includeIf('admin.stations.relationships.stationAddIncomes', ['addIncomes' => $station->stationAddIncomes])
        </div>
    </div>
</div>

@endsection