<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Total Income',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\AddIncome',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'addIncome',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                        now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Total Visitors',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Total',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'total',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'total',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where($settings2['filter_field'], '>=',
                        now()->subDays($settings2['filter_days'])->format('Y-m-d'));
                } elseif (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                        case 'week': $start = date('Y-m-d', strtotime('last Monday'));
                        break;
                        case 'month': $start = date('Y-m') . '-01';
                        break;
                        case 'year': $start = date('Y') . '-01-01';
                        break;
                    }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Total Visitors Per Day',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Total',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'total',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'total',
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'           => 'Total Income Per Day',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\AddIncome',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'addIncome',
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'           => 'Income Report',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\AddIncome',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'payment_type' => '',
                'source_type'  => 'source_type',
                'amount'       => '',
                'date'         => '',
                'income_type'  => '',
            ],
            'translation_key' => 'addIncome',
        ];

        $settings5['data'] = [];
        if (class_exists($settings5['model'])) {
            $settings5['data'] = $settings5['model']::latest()
                ->take($settings5['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings5)) {
            $settings5['fields'] = [];
        }

        $settings6 = [
            'chart_title'           => 'Visitors Report',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Total',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'nationality' => '',
                'gender'      => '',
                'total'       => '',
                'station'     => 'station',
                'date'        => '',
                'category'    => '',
            ],
            'translation_key' => 'total',
        ];

        $settings6['data'] = [];
        if (class_exists($settings6['model'])) {
            $settings6['data'] = $settings6['model']::latest()
                ->take($settings6['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings6)) {
            $settings6['fields'] = [];
        }

        return view('home', compact('chart3', 'chart4', 'settings1', 'settings2', 'settings5', 'settings6'));
    }
}
