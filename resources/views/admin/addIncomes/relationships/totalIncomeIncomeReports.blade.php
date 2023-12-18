<div class="m-3">

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.incomeReport.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-totalIncomeIncomeReports">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.incomeReport.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.incomeReport.fields.total_income') }}
                            </th>
                            <th>
                                {{ trans('cruds.incomeReport.fields.payment_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.incomeReport.fields.source_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.incomeReport.fields.from') }}
                            </th>
                            <th>
                                {{ trans('cruds.incomeReport.fields.to') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($incomeReports as $key => $incomeReport)
                            <tr data-entry-id="{{ $incomeReport->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $incomeReport->id ?? '' }}
                                </td>
                                <td>
                                    {{ $incomeReport->total_income->amount ?? '' }}
                                </td>
                                <td>
                                    {{ $incomeReport->payment_type->payment_type ?? '' }}
                                </td>
                                <td>
                                    {{ $incomeReport->source_type->source_type ?? '' }}
                                </td>
                                <td>
                                    {{ $incomeReport->from ?? '' }}
                                </td>
                                <td>
                                    {{ $incomeReport->to ?? '' }}
                                </td>
                                <td>
                                    @can('income_report_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.income-reports.show', $incomeReport->id) }}">
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
  let table = $('.datatable-totalIncomeIncomeReports:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection