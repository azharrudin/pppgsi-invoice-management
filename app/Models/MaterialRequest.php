<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'material_requests';

    protected $primaryKey = 'id';

    protected $fillable = [
        "requester",
        "department",
        "request_date",
        "status",
        "stock",
        "purchase",
        "note",
        "deleted_at",
    ];

    public $timestamp = true;

    public function materialRequestDetails(): HasMany
    {
        return $this->hasMany(MaterialRequestDetail::class, "material_request_id");
    }

    public function materialRequestSignatures(): HasMany
    {
        return $this->hasMany(MaterialRequestSignature::class, "material_request_id");
    }
}
