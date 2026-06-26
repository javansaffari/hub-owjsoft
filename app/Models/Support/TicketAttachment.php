<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'ticket_message_id',
        'file_name',
        'file_path',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function message()
    {
        return $this->belongsTo(TicketMessage::class, 'ticket_message_id');
    }
}
