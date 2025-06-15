<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transfer;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function saldo()
    {
        $saldo = Auth::user()->saldo;
        return view('saldo', compact('saldo'));
    }

    public function transfer()
    {
        return view('transfer');
    }

    public function processTransfer(Request $request)
    {
        $request->validate([
            'to_username' => 'required',
            'amount' => 'required|numeric|min:1',
            'password' => 'required',
        ]);

        $fromUser = Auth::user();
        $toUser = User::where('username', $request->to_username)->first();

        if (!$fromUser) {
            return redirect('/login')->withErrors(['msg' => 'Silakan login terlebih dahulu']);
        }

        if (!\Hash::check($request->password, $fromUser->password)) {
            return back()->withErrors(['password' => 'Password salah']);
        }

        if (!$toUser) {
            return back()->withErrors(['to_username' => 'User tujuan tidak ditemukan']);
        }

        if ($fromUser->saldo < $request->amount) {
            return back()->withErrors(['amount' => 'Saldo tidak cukup']);
        }

        // Update saldo langsung di database
        User::where('id', $fromUser->id)->update([
            'saldo' => DB::raw("saldo - {$request->amount}")
        ]);
        User::where('id', $toUser->id)->update([
            'saldo' => DB::raw("saldo + {$request->amount}")
        ]);

        Transfer::create([
            'from_user_id' => $fromUser->id,
            'to_user_id' => $toUser->id,
            'amount' => $request->amount
        ]);

        Transaction::create([
            'user_id' => $fromUser->id,
            'type' => 'debit',
            'amount' => $request->amount,
            'description' => 'Transfer ke ' . $toUser->username
        ]);

        Transaction::create([
            'user_id' => $toUser->id,
            'type' => 'kredit',
            'amount' => $request->amount,
            'description' => 'Transfer dari ' . $fromUser->username
        ]);

        return view('success', ['message' => 'Transfer berhasil']);
    }

    public function mutasi(Request $request)
    {
        $user = Auth::user();
        $transactions = $user->transactions()->latest();

        if ($request->filled('from') && $request->filled('to')) {
            $transactions->whereBetween('created_at', [
                $request->from . ' 00:00:00',
                $request->to . ' 23:59:59'
            ]);
        } elseif ($request->filled('from')) {
            $transactions->whereDate('created_at', $request->from);
        }

        return view('mutasi', [
            'transactions' => $transactions->get()
        ]);
    }


    // Menampilkan form pembayaran
    public function pembayaran()
    {
        return view('pembayaran');
    }

    public function processPembayaran(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nomor' => 'required',
            'amount' => 'required|numeric|min:1',
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (!\Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah']);
        }

        if ($user->saldo < $request->amount) {
            return back()->withErrors(['amount' => 'Saldo tidak cukup untuk melakukan pembayaran.']);
        }

        // Update saldo pengguna
        User::where('id', $user->id)->update([
            'saldo' => DB::raw("saldo - {$request->amount}")
        ]);

        // Simpan data pembayaran
        Payment::create([
            'user_id' => $user->id,
            'kategori' => $request->kategori,
            'nomor' => $request->nomor,
            'amount' => $request->amount
        ]);

        // Catat transaksi
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'debit',
            'amount' => $request->amount,
            'description' => 'Pembayaran ' . ucfirst($request->kategori)
        ]);

        return view('success', ['message' => 'Pembayaran berhasil']);
    }

    public function pembelian()
    {
        return view('pembelian');
    }

    public function processPembelian(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:pulsa,pln',
            'nomor' => 'required',
            'amount' => 'required|numeric|min:1',
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak sesuai.']);
        }

        if ($user->saldo < $request->amount) {
            return back()->withErrors(['amount' => 'Saldo tidak cukup.']);
        }

        User::where('id', $user->id)->update([
            'saldo' => DB::raw("saldo - {$request->amount}")
        ]);

        Purchase::create([
            'user_id' => $user->id,
            'jenis' => $request->jenis,
            'nomor' => $request->nomor,
            'amount' => $request->amount
        ]);

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'debit',
            'amount' => $request->amount,
            'description' => 'Pembelian ' . ucfirst($request->jenis)
        ]);

        return view('success', ['message' => 'Pembelian berhasil']);
    }
}
