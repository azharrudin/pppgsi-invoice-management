<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invoice_details';

    protected $fillable = [
        "invoice_id",
        "item",
        "description",
        "price",
        "tax",
        "total_price",
        'deleted_at',
    ];

    public $timestamp = true;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, "invoice_id");
    }
}