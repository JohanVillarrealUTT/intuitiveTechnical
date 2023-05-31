<?php

namespace App\Models;

use App\Mail\ContactUsMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone_number', 'email', 'time_of_experience', 'name_of_stalls', 'english_level', 'approved'];

    protected static function booted()
    {
        static::created(function ($contact) {
            if ($contact->approved) {

                $correoAprobado = new ContactUsMailable($contact);
                Mail::to($contact->email)->send($correoAprobado);
            }
        });
    }
}
