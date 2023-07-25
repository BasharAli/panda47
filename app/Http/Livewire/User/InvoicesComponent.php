<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class InvoicesComponent extends Component
{
    public function downloadInvoice($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->first();
        $invoicePath = public_path('main/images/invoices/' . $invoice->invoiceName);
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $invoice->invoiceName . '"',
        ];
        
        return Response::download($invoicePath, $invoice->invoiceName, $headers);

    }

    public function render()
    {
        $user_id = Auth::user()->id;

        $invoices = Invoice::where('user_id', $user_id)->get()->all();
        return view('livewire.user.invoices-component', compact('invoices'))->layout('layouts.base');
    }
}
