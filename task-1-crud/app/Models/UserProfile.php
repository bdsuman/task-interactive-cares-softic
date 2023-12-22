<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'date_of_birth'];

    // Add validation rules here
    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_profiles',
            'date_of_birth' => 'required|date',
        ];
    }

    // Bonus: Filter profiles by name
    public static function filterByName($name)
    {
        return UserProfile::where('name', 'like', '%' . $name . '%')->get();
    }
}
