<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'purchase_requests';

    protected $primaryKey = 'id';

    protected $fillable = [
        "department",
        "proposed_purchase_price",
        "budget_status",
        "request_date",
        "status",
        "requester",
        "total_budget",
        "remaining_budget",
        "material_request_id",
        "additional_note",
        "deleted_at",
    ];

    public $timestamp = true;

    public function materialRequest(): BelongsTo
    {
        return $this->BelongsTo(MaterialRequest::class, "material_request_id");
    }

    public function purchaseRequestDetails(): HasMany
    {
        return $this->hasMany(PurchaseRequestDetail::class, "purchase_request_id");
    }

    public function purchaseRequestSignatures(): HasMany
    {
        return $this->hasMany(PurchaseRequestSignature::class, "purchase_request_id");
    }
}
