<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
    {
        $transactions = Transaction::with(['user'])->get();

        return response()->json([
            'transactions' => $transactions,
        ]);
    }
}
