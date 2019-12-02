<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'transaction_date',
    ];

    protected $fillable = [
        'amount',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'transaction_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
