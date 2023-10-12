<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = \File::get(public_path('transactions.json'));
        $data = json_decode($json);

        foreach ($data->transactions as $transactions) {
            Transaction::create([
                'paidAmount' => $transactions->paidAmount,
                'Currency' => $transactions->Currency,
                'parentEmail' => $transactions->parentEmail,
                'statusCode' => $transactions->statusCode,
                'paymentDate' => $transactions->paymentDate,
                'parentIdentification' => $transactions->parentIdentification,
            ]);
        }
    }
}
