<?php

namespace App\Http\Controllers;

use App\Mail\Subscribed;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

/**
 * Controller to manage subscriptions
 */
class SubscriptionController extends Controller
{
    /**
     * Add a new subscriber
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // Get request parameters
        $params = $request->all();

        // Configure field rules
        $rules = [
            'email' => ['required', 'email', 'unique:subscribers'],
        ];

        // Set custom error messages
        $validatorMessages = [
            'email.required'    => 'The email address is required.',
            'email.unique'      => 'You have already subscribed to the newsletter.',
            'email.email'       => 'The email address is not valid.'
        ];

        // Performa data validation
        $validator = Validator::make($params, $rules, $validatorMessages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        $subscriber = new Subscriber();
        $subscriber->email = $params['email'];
        $subscriber->save();

        try {
            Mail::from('mailgun@mail.edulazaro.com')->to($subscriber->email)->send(new Subscribed($subscriber->email));
        } catch(\Exception $error) {
            return response()->json([
                'success' => true,
                'message' => 'Subscribed, but It was not possible to send an email: ' . $error->getMessage()
            ], 201);
        }

        return response()->json([
            'success' => true,
            'data' => $subscriber
        ], 201);
    }
}
