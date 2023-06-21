<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcardContact extends Model
{
    use HasFactory;

    protected $fillable = ['contact_name','country', 'contact', 'vcard_id'];
}
