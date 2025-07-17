<?php

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Models\PaymentLink;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentLinkController extends Controller
{
    // Show all payment links
    public function index()
    {
        $payments = PaymentLink::with('profile:id,name')->latest()->get();
        $profiles = Profile::all();

        // dd($payments->toArray());
        return view('services.payments.index', compact('payments', 'profiles'));
    }

    // Store new payment link
    public function store(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'plan' => 'required|string',
            'price' => 'required|numeric|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $finalAmount = $request->price - ($request->price * ($request->discount / 100));

        $paymentLink = PaymentLink::create([
            'profile_id' => $request->profile_id,
            'plan' => $request->plan,
            'price' => $request->price,
            'discount' => $request->discount,
            'final_amount' => round($finalAmount),
            'payment_link' => 'https://payment.example.com/' . Str::random(32),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Payment link created.');
    }

    // Show single payment
    public function show($id)
    {
        $payment = PaymentLink::with('profile')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    // Edit form
    public function edit($id)
    {
        $payment = PaymentLink::findOrFail($id);
        $profiles = Profile::all();
        return view('payments.edit', compact('payment', 'profiles'));
    }

    // Update record
    public function update(Request $request, $id)
    {
        $payment = PaymentLink::findOrFail($id);

        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'plan' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $finalAmount = $request->amount - ($request->amount * ($request->discount / 100));

        $payment->update([
            'profile_id' => $request->profile_id,
            'plan' => $request->plan,
            'amount' => $request->amount,
            'discount' => $request->discount,
            'final_amount' => $finalAmount,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment link updated.');
    }

    // Delete record
    public function destroy($id)
    {
        $payment = PaymentLink::findOrFail($id);
        $payment->delete();

        return redirect()->back()->with('success', 'Payment link deleted.');
    }
}
