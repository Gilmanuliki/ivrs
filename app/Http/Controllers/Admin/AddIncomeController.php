<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddIncomeRequest;
use App\Http\Requests\StoreAddIncomeRequest;
use App\Http\Requests\UpdateAddIncomeRequest;
use App\Models\AddIncome;
use App\Models\Source;
use App\Models\Station;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddIncomeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_income_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addIncomes = AddIncome::with(['station', 'source_type'])->get();

        return view('admin.addIncomes.index', compact('addIncomes'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_income_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('station', 'id')->prepend(trans('global.pleaseSelect'), '');

        $source_types = Source::pluck('source_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addIncomes.create', compact('source_types', 'stations'));
    }

    public function store(StoreAddIncomeRequest $request)
    {
        $addIncome = AddIncome::create($request->all());

        return redirect()->route('admin.add-incomes.index');
    }

    public function edit(AddIncome $addIncome)
    {
        abort_if(Gate::denies('add_income_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('station', 'id')->prepend(trans('global.pleaseSelect'), '');

        $source_types = Source::pluck('source_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addIncome->load('station', 'source_type');

        return view('admin.addIncomes.edit', compact('addIncome', 'source_types', 'stations'));
    }

    public function update(UpdateAddIncomeRequest $request, AddIncome $addIncome)
    {
        $addIncome->update($request->all());

        return redirect()->route('admin.add-incomes.index');
    }

    public function show(AddIncome $addIncome)
    {
        abort_if(Gate::denies('add_income_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addIncome->load('station', 'source_type');

        return view('admin.addIncomes.show', compact('addIncome'));
    }

    public function destroy(AddIncome $addIncome)
    {
        abort_if(Gate::denies('add_income_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addIncome->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddIncomeRequest $request)
    {
        $addIncomes = AddIncome::find(request('ids'));

        foreach ($addIncomes as $addIncome) {
            $addIncome->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
