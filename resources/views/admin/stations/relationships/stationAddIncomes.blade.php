<div class="m-3">
    @can('add_income_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.add-incomes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.addIncome.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.addIncome.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-stationAddIncomes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.amount') }}
                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.station') }}
                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.income_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.payment_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.source_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.addIncome.fields.date') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addIncomes as $key => $addIncome)
                            <tr data-entry-id="{{ $addIncome->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $addIncome->id ?? '' }}
                                </td>
                                <td>
                                    {{ $addIncome->amount ?? '' }}
                                </td>
                                <td>
                                    {{ $addIncome->station->station ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\AddIncome::INCOME_TYPE_SELECT[$addIncome->income_type] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\AddIncome::PAYMENT_TYPE_SELECT[$addIncome->payment_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $addIncome->source_type->source_type ?? '' }}
                                </td>
                                <td>
                                    {{ $addIncome->date ?? '' }}
                                </td>
                                <td>
                                    @can('add_income_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.add-incomes.show', $addIncome->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('add_income_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.add-incomes.edit', $addIncome->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('add_income_delete')
                                        <form action="{{ route('admin.add-incomes.destroy', $addIncome->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
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
@can('add_income_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-incomes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-stationAddIncomes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection