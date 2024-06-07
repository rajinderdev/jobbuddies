<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CampRegistration;
use Barryvdh\DomPDF\Facade\Pdf;
use Stripe;
use Str;
use Mail;
class CampController extends Controller
{
   
    public function summerRegistration(Request $request)
    {
        $campRegistration = CampRegistration::create($request->all());
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'This is Summer Camp Registration payment',
              
            ],
            'unit_amount' =>  intval((95+2.85) * 100),
            ],
            'quantity' => 1,
        ]],
        'invoice_creation' => [
            'enabled' => true,
             'invoice_data'=>[
                'metadata'=> [
                  'summerRegistrationId' => $campRegistration->id,
                  'studentEmail' => $campRegistration->email,
                  'studentName' => $campRegistration->student_name,
                ],
             ],
        ],
        'metadata' => [
            'summerRegistrationId' => $campRegistration->id,
            'studentEmail' => $campRegistration->email,
            'studentName' => $campRegistration->student_name,
        ],
        'mode' => 'payment',
        'payment_method_types' =>['card','us_bank_account'],
        'success_url' => 'https://superschool.org?registrationPaymentSuccess=true',
        'cancel_url' => 'https://superschool.org/',
        ]);
         \Log::info($checkout_session);
         return response()->json([
                    'success' => true,
                    'campRegistration' =>$campRegistration,
                    'checkout_session' =>$checkout_session,
                ], 200); 
    }

   
    // public function getCampRegistrationPaymentUrl(Request $request)
    // {
    //     $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    //     $checkout_session = $stripe->checkout->sessions->create([
    //     'line_items' => [[
    //         'price_data' => [
    //         'currency' => 'usd',
    //         'product_data' => [
    //             'name' => 'This is Summer Camp Registration payment',
              
    //         ],
    //         'unit_amount' => (95+2.85),
    //         ],
    //         'quantity' => 1,
    //     ]],
    //     'invoice_creation' => [
    //         'enabled' => true
    //     ],
    //     'metadata' => [
    //         'summerRegistrationId' => $request->id,
    //     ],
    //     'mode' => 'payment',
    //     'payment_method_types' =>['card','us_bank_account'],
    //     'success_url' => 'https://superschool.org?success=true',
    //     'cancel_url' => 'https://superschool.org/',
    //     ]);
    //      return response()->json([
    //                 'success' => true,
    //                 'checkout_session' =>$checkout_session,
    //             ], 200); 
    // }
}

       