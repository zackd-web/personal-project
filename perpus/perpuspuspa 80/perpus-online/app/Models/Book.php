<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'category_id',
        'year',
        'description',
        'cover_image',
        'total_copies',
        'available_stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function activeBorrowings()
    {
        return $this->hasMany(Borrowing::class)->whereIn('status', ['borrowed', 'overdue']);
    }

    public function updateStock()
    {
        $borrowedCount = $this->borrowings()
            ->whereIn('status', ['dipinjam', 'terlambat'])
            ->count();

        $available = $this->total_copies - $borrowedCount;

        // Pastikan tidak negatif dan tidak melebihi total_copies
        $this->available_stock = max(0, min($available, $this->total_copies));
        $this->save();
    }

}