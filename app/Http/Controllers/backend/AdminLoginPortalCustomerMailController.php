<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\CustomEmail;
use App\Mail\SendCredentialMail;
use App\Mail\UserBlockedMail;
use App\Mail\UserUnblockedMail;
use App\Models\frontend\CustomerModel;
use Illuminate\Http\Request;
use Mail;

class AdminLoginPortalCustomerMailController extends Controller
{

    public function sendCredentials(Request $request)
    {
        $validated = $request->validate([
            'method' => 'required|in:email,sms',
            'user_id' => 'required|exists:customers,id',
        ]);
        $user = CustomerModel::find($validated['user_id']);

        if ($validated['method'] === 'email') {
            return $this->sendCredentialEmail($user->id);
        }

        $message = <<<EOT
Hello {$user->full_name},

Welcome to AlphaVision Security!

Login Details:
Email: {$user->email}
Password: {$user->raw_password}

Login: https://alphavisionsecurity.com.au/customerportal/login

⚠️ Please change your password after logging in.

- AlphaVision Security
EOT;


        if ($validated['method'] === 'sms') {
            $twilioService = app('App\Services\TwilioService');
            $response = $twilioService->sendSms($user->phone_number, $message);

            if ($response->sid) {
                return redirect()->back()->with('success', 'SMS sent successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to send SMS. Please try again.');
            }
        }
        return redirect()->back()->with('error', 'Invalid method selected.');
    }


    public function sendCredentialEmail($id)
    {
        $user = CustomerModel::findOrFail($id);
        if (!$user) {
            return redirect()->back()->with('error', 'This user is not found in the database');
        }

        try {
            Mail::to($user->email)->send(new SendCredentialMail($user));
            return redirect()->back()->with('success', 'Credential email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send the credential email. Please try again later.');
        }
    }

    public function sendCustomEmailView($id)
    {
        $user = CustomerModel::findOrFail($id);
        if (!$user) {
            return redirect()->back()->with('error', 'This user is not found in the database');
        }
        return view('backend.custom-email', ['email' => $user->email]);
    }

    public function sendCustomSmsView($id)
    {
        $user = CustomerModel::findOrFail($id);
        if (!$user) {
            return redirect()->back()->with('error', 'This user is not found in the database');
        }
        return view('backend.custom-sms', ['phone' => $user->phone_number]);
    }

    public function sendCustomEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'attachment' => 'nullable|file|max:2048',
        ]);
        try {
            Mail::to($request->email)->send(
                new CustomEmail($request->subject, $request->body)
            );
            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please try again.');
        }
    }

    // Notify via SMS (block/unblock)
    public function sendBlockedStatusSMS($id)
    {

        $customer = CustomerModel::findOrFail($id);
        if (!$customer) {
            return redirect()->back()->with('error', 'This user is not found in the database');
        }

        $blockedMessage = <<<EOT
Hello {$customer->full_name},

We wanted to inform you that your access to the AlphaVision Security Customer Portal has been temporarily **blocked**.

If you believe this is a mistake or have any questions, please contact our support team.

🔒 Access Restricted
📧  https://alphavisionsecurity.com.au/contact-us

Thank you for your understanding.

- AlphaVision Security Team
EOT;

        $unblockedMessage = <<<EOT
Hello {$customer->full_name},

Good news! Your access to the AlphaVision Security Customer Portal has been **restored**.

You can now log in and continue using our services.

🔓 Access Restored
🔗 https://alphavisionsecurity.com.au/customerportal/login

If you encounter any issues, feel free to reach out to us.

- AlphaVision Security Team
EOT;



        $customer = CustomerModel::findOrFail($id);
        $message = $customer->is_active == 1
            ? $unblockedMessage
            : $blockedMessage;


        $twilioService = app('App\Services\TwilioService');
        $response = $twilioService->sendSms($customer->phone_number, $message);
        if ($response->sid) {
            return redirect()->back()->with('success', 'SMS sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to send SMS. Please try again.');
        }
    }

    public function sendBlockedStatusEmail($id)
    {
        $customer = CustomerModel::findOrFail($id);
        if (!$customer) {
            return redirect()->back()->with('error', 'This user is not found in the database');
        }
        if ($customer->is_active == 1) {
            Mail::to($customer->email)->send(new UserUnblockedMail($customer));
        } else {
            Mail::to($customer->email)->send(new UserBlockedMail($customer));
        }

        return redirect()->back()->with('success', 'Email sent successfully!');
    }

}
