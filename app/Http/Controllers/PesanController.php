<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Mail\PesanMasuk;
use Illuminate\Support\Facades\Mail;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pesan.pesan', [
            'title' => 'Pesan',
            'pesans' => Pesan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        try {
            Pesan::create($validatedData);
            // Kirim email ke Anda
            Mail::to('illumaxid@gmail.com')->send(new PesanMasuk($validatedData));

            return redirect()->back()->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->input('ids');
        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'Tidak ada pesan yang dipilih.');
        }

        // Hapus berdasarkan id
        Pesan::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Pesan terpilih berhasil dihapus.');
    }
}
