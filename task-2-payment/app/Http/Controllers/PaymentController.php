<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.form');
    }

    public function processPayment(Request $request)
    {
        // Validate payment details
        $validatedData = $request->validate([
            'user_id' => 'required',
            'amount' => 'required|numeric|min:0.01',
        ]);

        // Simulate payment success or failure
        $paymentStatus = $this->simulatePayment();

        // Store transaction details in the database
        $transaction = Transaction::create([
            'user_id' => $validatedData['user_id'],
            'transaction_id' => uniqid(),
            'amount' => $validatedData['amount'],
            'status' => $paymentStatus,
        ]);

        return redirect()->route('payment.form')->with('status', 'Payment processed successfully!');
    }

    private function simulatePayment()
    {
        // Simulate payment success or failure (for demonstration purposes)
        return rand(0, 1) ? 'success' : 'failed';
    }
}

