<?php

namespace App\Models;

use App\Http\Controllers\CobaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function friends()
    {
        return $this->hasMany('App\Models\Friends');
    }

}
