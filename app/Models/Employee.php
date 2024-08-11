<?php

namespace App\Models;

use App\Models\Divition;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $keyType = 'string';
    protected $primaryKey  = 'id';
    public $incrementing = false;
    public $timestamps = true;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
    public function divition()
    {
        return $this->belongsTo(Divition::class, 'id_divition', 'id');
    }
}
