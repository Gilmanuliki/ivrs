<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddIncome extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'add_incomes';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const INCOME_TYPE_SELECT = [
        'Domestic'  => 'Domestic',
        'Foreigner' => 'Foreigner',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'Cash'           => 'Cash',
        'Mobile Payment' => 'Mobile Payment',
        'Bank Payment'   => 'Bank Payment',
    ];

    protected $fillable = [
        'amount',
        'station_id',
        'income_type',
        'payment_type',
        'source_type_id',
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function source_type()
    {
        return $this->belongsTo(Source::class, 'source_type_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
