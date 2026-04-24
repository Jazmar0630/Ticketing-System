<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'status', 'follow_up',
        'accepted_by', 'date_accepted', 'time_accepted',
        'followup_by', 'division', 'date_followup',
    ];
}
