<?php

namespace App\Http\Controllers;

use App\Mail\QuotationMail;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact & quotation request page.
     */
    public function index(): View
    {
        return view('contact');
    }

    /**
     * Process quotation request, store inquiry, and send official quotation email.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'project_scale' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $inquiry = Inquiry::create($validated);

        $emailSent = false;
        try {
            Mail::to($inquiry->email)
                ->bcc(config('mail.from.address', 'ivan@uccca.site'))
                ->send(new QuotationMail($inquiry));
            $emailSent = true;
        } catch (\Throwable $e) {
            Log::error('Failed sending quotation mail: ' . $e->getMessage());
        }

        $message = 'Terima kasih Bpk/Ibu ' . $inquiry->name . '! Permintaan quotation Anda telah berhasil diproses.';
        if ($emailSent) {
            $message .= ' Salinan rincian quotation resmi telah dikirimkan ke email ' . $inquiry->email . '.';
        } else {
            $message .= ' Data kebutuhan proyek telah tersimpan di sistem, tim engineering kami akan segera menghubungi Anda.';
        }

        return back()->with('success', $message);
    }
}
