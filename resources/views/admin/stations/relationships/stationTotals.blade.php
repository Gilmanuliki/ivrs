<div class="m-3">
    @can('total_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.totals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.total.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.total.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-stationTotals">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.total.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.total.fields.total') }}
                            </th>
                            <th>
                                {{ trans('cruds.total.fields.category') }}
                            </th>
                            <th>
                                {{ trans('cruds.total.fields.station') }}
                            </th>
                            <th>
                                {{ trans('cruds.total.fields.nationality') }}
                            </th>
                            <th>
                                {{ trans('cruds.total.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.total.fields.date') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals as $key => $total)
                            <tr data-entry-id="{{ $total->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $total->id ?? '' }}
                                </td>
                                <td>
                                    {{ $total->total ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Total::CATEGORY_SELECT[$total->category] ?? '' }}
                                </td>
                                <td>
                                    {{ $total->station->station ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Total::NATIONALITY_SELECT[$total->nationality] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Total::GENDER_SELECT[$total->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ $total->date ?? '' }}
                                </td>
                                <td>
                                    @can('total_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.totals.show', $total->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('total_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.totals.edit', $total->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('total_delete')
                                        <form action="{{ route('admin.totals.destroy', $total->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('total_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.totals.massDestroy') }}",
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
  let table = $('.datatable-stationTotals:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection