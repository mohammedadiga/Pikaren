<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vcard extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'slug', 'image', 'name', 'company_name', 'company_work'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Address(){
        return $this->hasMany(VcardAddress::class);
    }

    public function Contact(){
        return $this->hasMany(VcardContact::class);
    }

    public function Bank(){
        return $this->hasMany(VcardBank::class);
    }

    public function SocialMedia(){
        return $this->hasMany(VcardMedia::class);
    }

    public function note(){
        return $this->hasMany(VcardNotes::class);
    }
}
