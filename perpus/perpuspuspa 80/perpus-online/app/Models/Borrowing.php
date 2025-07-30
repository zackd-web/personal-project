<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'member_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
        'condition',
        'notes'
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'due_date' => 'date',
        'return_date' => 'date'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function isOverdue()
    {
        return $this->status !== 'dikembalikan' && Carbon::now()->gt($this->due_date);
    }

    public function markAsReturned($condition = 'good', $notes = null)
    {
        $this->update([
            'return_date' => now(),
            'status' => 'dikembalikan',
            'condition' => $condition,
            'notes' => $notes
        ]);

        $this->book->updateStock();
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($borrowing) {
            $borrowing->book->updateStock();
        });

        static::updated(function ($borrowing) {
            if ($borrowing->wasChanged('status')) {
                $borrowing->book->updateStock();
            }
        });
    }
}