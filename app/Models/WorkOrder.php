<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'work_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        "scope",
        "classification",
        "work_order_date",
        "action_plan_date",
        "status",
        "damage_report_id",
        "finish_plan",
        "job_description",
        "klasifikasi",
        "deleted_at",
    ];

    public $timestamp = true;

    public function workOrderDetails(): HasMany
    {
        return $this->hasMany(WorkOrderDetail::class, "work_order_id");
    }

    public function workOrderSignatures(): HasMany
    {
        return $this->hasMany(WorkOrderSignature::class, "work_order_id");
    }
}
