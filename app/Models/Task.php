<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['task_name', 'due_date', 'description', 'users_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}