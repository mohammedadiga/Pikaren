<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcardBank extends Model
{
    use HasFactory;

    protected $fillable = ['bank', 'bank_name', 'bank_iban', 'vcard_id'];
}
