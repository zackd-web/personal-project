<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Carbon\Carbon;

class DashboardController extends Controller
{   
    public function main(){
        return view("main");
    }
    public function index()
    {
        $totalBooks = Book::count();
        $booksBorrowed = Borrowing::whereIn('status', ['dipinjam', 'terlambat'])->count();
        $overdueBooks = Borrowing::where('status', 'terlambat')
            ->orWhere(function($query) {
                $query->where('status', 'dipinjam')
                      ->where('due_date', '<', Carbon::now());
            })->count();
        $activeMembers = Member::where('status', 'active')->count();

        $recentActivity = Borrowing::with(['book', 'member'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $bookStatus = [
            'available' => Book::sum('available_stock'),
            'dipinjam' => $booksBorrowed,
            'terlambat' => $overdueBooks,
            'reserved' => 0 // Placeholder for future feature
        ];
        
        return view('dashboard.index', compact(
            'totalBooks',
            'booksBorrowed', 
            'overdueBooks',
            'activeMembers',
            'recentActivity',
            'bookStatus'
        ));
    }
}