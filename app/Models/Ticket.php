<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tickets';

    protected $primaryKey = 'id';

    protected $fillable = [
        "reporter_name",
        "reporter_phone",
        "reporter_company",
        "ticket_title",
        "ticket_body",
        "status",
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamp = true;

    public function ticketAttachments(): HasMany
    {
        return $this->hasMany(TicketAttachment::class, "ticket_id");
    }
}
