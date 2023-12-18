<?php

namespace App\Http\Requests;

use App\Models\AddIncome;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddIncomeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_income_create');
    }

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'station_id' => [
                'required',
                'integer',
            ],
            'income_type' => [
                'required',
            ],
            'payment_type' => [
                'required',
            ],
            'source_type_id' => [
                'required',
                'integer',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
