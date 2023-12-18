<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Total extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'totals';

    public const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    public const CATEGORY_SELECT = [
        'Adult'   => 'Adult',
        'Student' => 'Student',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const NATIONALITY_SELECT = [
        'domestic'  => 'Domestic',
        'foreigner' => 'Foreigner',
    ];

    protected $fillable = [
        'total',
        'category',
        'station_id',
        'nationality',
        'gender',
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

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
