<?php

namespace App\Http\Controllers\Payment;

use Stripe\Stripe;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    public function checkout()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Créer une session de paiement Stripe
        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Paiement exemple',
                    ],
                    'unit_amount' => 10000, // Montant en cents (100 USD ici)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        // Redirige vers la page de paiement Stripe
        return redirect($checkoutSession->url);
    }

    public function stripeSuccess(Request $request)
    {
        $paymentIntent = $request->input('payment_intent');
    
        if ($paymentIntent) {
            $intent = \Stripe\PaymentIntent::retrieve($paymentIntent);
    
            Payment::create([
                'payment_id' => $intent->id,
                'user_id' => auth()->id(),
                'amount' => $intent->amount / 100,
                'currency' => $intent->currency,
                'status' => $intent->status,
            ]);
    
            return view('payment.stripe.success');
        }
    
        return redirect()->route('stripe.cancel');
    }
    

    public function cancel()
    {
        return view('payment.stripe.cancel'); // Crée une vue d'annulation de paiement
    }
}
