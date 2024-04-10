<?php

namespace App\Models;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function phases()
    {
        return $this->hasMany(Phase::class);
    }

    public function investisseurs()
    {
        return $this->belongsToMany(User::class, 'invests');
    }
}
