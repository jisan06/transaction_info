<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    public function index()
    {
        $statusHeader = request()->header('X-Mock-Status');
        $transactions = Transaction::all();
        if($statusHeader == 'accepted') {
            return response()->json($transactions);
        }else {
            return response()->json([
                'status' => 'failed'
            ]);
        }

    }

    public function store(Request $request)
    {
        $firstApiResponse = Http::get( url('/') . '/api/transactions', $request->all());
        $transaction = new Transaction([
           'user_id' => $request->user_id,
           'amount' => $request->amount,
        ]);

        $transaction->save();

        return response()->json([
            'status' => 'success',
            'transaction_id' => $transaction->id,
        ]);
    }

    public function show($id)
    {
        // Retrieve a specific item
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        if($transaction) {
            $transaction->user_id = $request->input('user_id', $transaction->user_id);
            $transaction->amount = $request->input('amount', $transaction->amount);
            $transaction->save();

            return response()->json([
                'status' => 'success',
                'transaction_id' => $transaction->id,
            ]);
        }
    }

    public function destroy($id)
    {
        // Delete a specific item
    }
}
