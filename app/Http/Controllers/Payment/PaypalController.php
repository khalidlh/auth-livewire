<?php

namespace App\Http\Controllers\Payment;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function createPayment()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD", // Tu peux changer la devise
                        "value" => "100.00" // Montant à payer
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ]
        ]);

        // Rediriger l'utilisateur vers PayPal pour effectuer le paiement
        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du paiement PayPal.');
    }

    // Gérer le retour de PayPal après un paiement réussi
    public function paypalSuccess(Request $request)
    {
        // Logique pour capturer le paiement et obtenir les détails
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        // Assurez-vous de capturer le paiement ici
        $orderId = $request->get('token'); // ID de la commande (ou token)
        $paymentDetails = $provider->capturePaymentOrder($orderId);
    
        // Vérifier le statut du paiement
        if ($paymentDetails['status'] === 'COMPLETED') {
            // Enregistrement des détails du paiement dans la base de données
            $payment = new Payment();
            $payment->payment_id = $paymentDetails['id'];
            $payment->user_id = auth()->id(); // ID de l'utilisateur connecté
            $payment->amount = $paymentDetails['purchase_units'][0]['amount']['value'];
            $payment->currency = $paymentDetails['purchase_units'][0]['amount']['currency_code'];
            $payment->status = 'success';
            $payment->save();
    
            return view('payment.paypale.success'); // Rediriger vers la page de succès
        }
    
        return redirect()->route('paypal.cancel'); // Rediriger vers la page d'annulation
    }
    


    // Gérer le retour de PayPal après une annulation
    public function paymentCancel()
    {
        return view('payment.paypale.cancel'); 
       // return redirect()->route('payment')->with('error', 'Paiement PayPal annulé.');
    }
}