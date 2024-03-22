<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'purchase_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        "purchase_order_number",
        "vendor_id",
        "about",
        "grand_total",
        "purchase_order_date",
        "status",
        "note",
        "grand_total_spelled",
        "term_and_conditions",
        "signature",
        "signature_name",
        "deleted_at",
    ];

    public $timestamp = true;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->resetYearlyNumber();
    }

    public function resetYearlyNumber()
    {
        $year = now()->year;

        $maxNumberForYear = static::whereYear('created_at', $year)->max('purchase_order_number') ?: 0;

        $this->purchase_order_number = str_pad($maxNumberForYear + 1, 5, '0', STR_PAD_LEFT);
    }

    public function vendor(): BelongsTo
    {
        return $this->BelongsTo(Vendor::class, "vendor_id");
    }

    public function tenant(): BelongsTo
    {
        return $this->BelongsTo(MaterialRequest::class, "tenant_id");
    }

    public function purchaseOrderDetails(): HasMany
    {
        return $this->hasMany(PurchaseOrderDetail::class, "purchase_order_id");
    }

    public function vendorAttachment(): HasMany
    {
        return $this->hasMany(VendorAttachment::class, "purchase_order_id");
    }
}
