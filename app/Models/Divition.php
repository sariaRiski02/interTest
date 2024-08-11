<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divition extends Model
{
    use HasFactory;
    protected $table = 'divitions';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;


    protected $guarded = [
        'id'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'id_divition', 'id');
    }
}
