<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function generate($transactionId)
    {
        $transaction = Transaction::with('customer')->findOrFail($transactionId);

        if ($transaction->status_pembayaran !== 'PAID') {
            return redirect()->back()->with('error', 'Pembayaran belum selesai');
        }

        $existingTicket = Ticket::where('transaction_id', $transaction->id)->first();
        if ($existingTicket) {
            return redirect()->route('ticket.show', $existingTicket->id);
        }

        $ticket = Ticket::create([
            'transaction_id' => $transaction->id,
            'customer_id' => 1,
            'booking_code'   => $this->generateBookingCode(),
            'tanggal_tiket'  => Carbon::now(),
        ]);

        return redirect()->route('ticket.show', $ticket->id);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('pages.tiket', compact('ticket'));
    }

    private function generateBookingCode()
    {
        return 'TRVL-' . date('Y') . '-' . strtoupper(Str::random(4));
    }
}
