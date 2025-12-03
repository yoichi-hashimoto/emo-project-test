<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_label',
        'bio',
        'avatar_path',
        'sort_order',
    ];

    // app/Models/Member.php

public function user()
{
    return $this->belongsTo(User::class);
}

}
