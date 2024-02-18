<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = ['name', 'school_name', 'phone_number', 'email', 'future_goals', 'core_values', 'self_pr'];

    public function updateProfile($data)
    {
        $profile = self::findOrFail(1);
        $profile->update($data);
        return $profile;
    }
}
