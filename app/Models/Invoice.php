<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->createInvoiceNumber();
    }

    public function createInvoiceNumber()
    {
        $romanNumerals = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];

        $currentMonth = date('n');
        $currentMonthRoman = $romanNumerals[$currentMonth];
        $currentYearLastTwoDigits = date('y');
        $autoIncrement = DB::table('invoices')->whereMonth('created_at', now()->month)->count() + 1;

        $this->invoice_number = "GSI-FIN/$currentMonthRoman/$currentYearLastTwoDigits/" . str_pad($autoIncrement, 4, '0', STR_PAD_LEFT);
    }

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
