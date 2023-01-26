<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'order', 'status_id'];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assigned(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'assigned_to_user_id');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
