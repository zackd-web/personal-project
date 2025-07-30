<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'join_date',
        'status'
    ];

    protected $casts = [
        'join_date' => 'date'
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function activeBorrowings()
    {
        return $this->hasMany(Borrowing::class)->whereIn('status', ['borrowed', 'overdue']);
    }
}