<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tenants';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'floor',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamp = true;
}
