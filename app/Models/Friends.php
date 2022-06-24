<?php

namespace App\Models;

use App\Http\Controllers\groupsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function groups()
    {
        return $this->belongsTo('App\Models\groups');
    }
}
