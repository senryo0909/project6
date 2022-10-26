<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
        'user_id', 'body',
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
