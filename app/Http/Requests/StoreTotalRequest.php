<?php

namespace App\Http\Requests;

use App\Models\Total;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTotalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('total_create');
    }

    public function rules()
    {
        return [
            'total' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'category' => [
                'required',
            ],
            'station_id' => [
                'required',
                'integer',
            ],
            'nationality' => [
                'required',
            ],
            'gender' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
