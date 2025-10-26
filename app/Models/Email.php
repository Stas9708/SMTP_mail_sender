<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Email extends Model
{
    protected $fillable = [
        'uuid',
        'sender_address',
        'recipient_address',
        'copy_address_letter',
        'ip',
        'user_agent'];
}
