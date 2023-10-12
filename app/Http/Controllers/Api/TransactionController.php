<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions(Request $request)
    {
        $transactions = Transaction::with(['user'])->where(function ($query) use ($request) {
            if ($request->exists('statusCode')) {
                $query->where('statusCode', $request->statusCode);
            }
            if ($request->exists('currency')) {
                $query->where('currency', $request->currency);
            }
            if ($request->exists('amountFrom')) {
                $query->where('paidAmount', '>=', $request->amountFrom);
            }
            if ($request->exists('amountTo')) {
                $query->where('paidAmount', '<=', $request->amountTo);
            }
            if ($request->exists('dateFrom')) {
                $query->whereDate('paymentDate', '>=', $request->dateFrom);
            }
            if ($request->exists('dateTo')) {
                $query->whereDate('paymentDate', '<=', $request->dateTo);
            }
        })->get();

        return response()->json([
            'transactions' => $transactions,
        ]);
    }
}