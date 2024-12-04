<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Order;

class AdminController extends Controller
{
    public function index() {
        $today = Carbon::now();
        
        $salesCounts = [];
    
        $allCount = 0;
        $salesCounts = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = $today->copy()->subDays($i)->toDateString();
            $count = Order::whereDate('created_at', $date)->sum('count');
            $salesCounts[] = $count;
            $allCount += $count;
        }

        return view('admin', [
            'category' => Category::all(),
            'salesCounts' => $salesCounts,
            'allCount' => $allCount,
            'dates' => [
                $today->copy()->subDays(6)->format('d F'),
                $today->copy()->subDays(5)->format('d F'),
                $today->copy()->subDays(4)->format('d F'),
                $today->copy()->subDays(3)->format('d F'),
                $today->copy()->subDays(2)->format('d F'),
                $today->copy()->subDays(1)->format('d F'),
                $today->format('d F')
            ]
        ]);
    }
}
