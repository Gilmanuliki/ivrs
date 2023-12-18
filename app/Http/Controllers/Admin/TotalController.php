<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTotalRequest;
use App\Http\Requests\StoreTotalRequest;
use App\Http\Requests\UpdateTotalRequest;
use App\Models\Station;
use App\Models\Total;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TotalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('total_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $totals = Total::with(['station'])->get();

        return view('admin.totals.index', compact('totals'));
    }

    public function create()
    {
        abort_if(Gate::denies('total_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('station', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.totals.create', compact('stations'));
    }

    public function store(StoreTotalRequest $request)
    {
        $total = Total::create($request->all());

        return redirect()->route('admin.totals.index');
    }

    public function edit(Total $total)
    {
        abort_if(Gate::denies('total_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('station', 'id')->prepend(trans('global.pleaseSelect'), '');

        $total->load('station');

        return view('admin.totals.edit', compact('stations', 'total'));
    }

    public function update(UpdateTotalRequest $request, Total $total)
    {
        $total->update($request->all());

        return redirect()->route('admin.totals.index');
    }

    public function show(Total $total)
    {
        abort_if(Gate::denies('total_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $total->load('station');

        return view('admin.totals.show', compact('total'));
    }

    public function destroy(Total $total)
    {
        abort_if(Gate::denies('total_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $total->delete();

        return back();
    }

    public function massDestroy(MassDestroyTotalRequest $request)
    {
        $totals = Total::find(request('ids'));

        foreach ($totals as $total) {
            $total->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
