<?php


namespace App\Http\Controllers;

use App\Mail\ContactMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class ProjectSayogiController extends Controller
{
    public function contactMail(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            $adminMessage = "New contact submission:\n\n"
                . "Name: {$data['fullname']}\n"
                . "Phone: {$data['phone_number']}\n"
                . "Email: {$data['email']}\n"
                . "Message: {$data['message']}";



            $userMessage = "Hi {$data['fullname']},\n\n"
                . "Thank you for contacting us. We have received your message and will get back to you shortly.\n\n"
                . "Best regards,\nProject Sayogi";


            // Send email to admin (queued)
            Mail::to('sumitapoudel12@gmail.com') // replace with your admin email
                ->queue(new ContactMailNotification($data['fullname'], 'New Contact Submission', $adminMessage));


            // Send confirmation email to user (queued)
            Mail::to($data['email'])
                ->queue(new ContactMailNotification($data['fullname'], 'Contact Confirmation', $userMessage));

            return back()->with('success', 'Emails have been sent successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
 