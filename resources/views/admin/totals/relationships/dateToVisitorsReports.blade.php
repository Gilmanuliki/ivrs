<div class="m-3">

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.visitorsReport.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-dateToVisitorsReports">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.visitorsReport.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.visitorsReport.fields.visitors') }}
                            </th>
                            <th>
                                {{ trans('cruds.visitorsReport.fields.station') }}
                            </th>
                            <th>
                                {{ trans('cruds.visitorsReport.fields.date_from') }}
                            </th>
                            <th>
                                {{ trans('cruds.visitorsReport.fields.date_to') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitorsReports as $key => $visitorsReport)
                            <tr data-entry-id="{{ $visitorsReport->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $visitorsReport->id ?? '' }}
                                </td>
                                <td>
                                    {{ $visitorsReport->visitors->total ?? '' }}
                                </td>
                                <td>
                                    {{ $visitorsReport->station->date ?? '' }}
                                </td>
                                <td>
                                    {{ $visitorsReport->date_from->date ?? '' }}
                                </td>
                                <td>
                                    {{ $visitorsReport->date_to->date ?? '' }}
                                </td>
                                <td>
                                    @can('visitors_report_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.visitors-reports.show', $visitorsReport->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan



                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-dateToVisitorsReports:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection