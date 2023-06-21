<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcardNotes extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'vcard_id'];
}
