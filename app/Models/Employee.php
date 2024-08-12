<?php

namespace App\Models;

use App\Models\Division;
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
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
}
