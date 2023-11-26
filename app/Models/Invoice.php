<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invoices';

    protected $primaryKey = 'id';

    protected $fillable = [
        "invoice_number",
        "tenant_id",
        "grand_total",
        "invoice_date",
        "invoice_due_date",
        "status",
        "opening_paragraph",
        "contract_number",
        "contract_date",
        "addendum_number",
        "addendum_date",
        "grand_total_spelled",
        "materai_date",
        "materai_image",
        "materai_name",
        "term_and_conditions",
        "bank_id",
        'deleted_at',
    ];

    public $timestamp = true;

    public function invoiceDetails(): HasMany
    {
        return $this->hasMany(InvoiceDetail::class, "invoice_id");
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class, "tenant_id");
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, "bank_id");
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class, "invoice_id");
    }
}
