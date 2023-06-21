<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcardAddress extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'province', 'district', 'address1', 'address2', 'vcard_id'];
}
