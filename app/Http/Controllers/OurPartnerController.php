<?php

namespace App\Http\Controllers;

use App\Models\OurPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OurPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = OurPartner::query();
        // Menambahkan logika pencarian berdasarkan nama
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }


        return view('dashboard.partner.partner', [
            'title' => 'Data Our Partner',
            'partner' => $query->paginate(10)->appends(['search' => $request->input('search')]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('gambar')) {
            // Mulai transaksi database
            DB::beginTransaction();
            try {
                $gambar = $request->file('gambar');
                $nama_gambar = $request->title . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('assets/images/our-partner'), $nama_gambar);

                // Menambahkan nama file ke array validatedData
                $validatedData['gambar'] = $nama_gambar;

                // Menyimpan data ke database
                OurPartner::create($validatedData);

                // Commit transaksi jika semuanya berhasil
                DB::commit();

                return redirect('/dashboard/our-partner')->with('success', 'Gambar Berhasil di Tambahkan');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Hapus file yang sudah diupload jika terjadi error
                if (file_exists(public_path('assets/images/our-partner/' . $nama_gambar))) {
                    unlink(public_path('assets/images/our-partner/' . $nama_gambar));
                }

                // Kembali ke halaman sebelumnya dengan pesan error
                return redirect()
                    ->back()
                    ->with(['error' => 'Terjadi kesalahan, Silahkan coba lagi.']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OurPartner $ourPartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurPartner $ourPartner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ourpartner = OurPartner::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        try {
            // Ambil judul baru dari request
            $title = $validatedData['title'];

            if ($request->has('gambar')) {
                File::delete('assets/images/our-partner/' . $ourpartner->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = $request->title . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/our-partner', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Jika tidak ada gambar baru, ganti nama gambar lama mengikuti title baru
                $oldImageName = $ourpartner->gambar;
                $extension = pathinfo($oldImageName, PATHINFO_EXTENSION); // Ambil ekstensi gambar lama
                $nama_gambar = $title . '.' . $extension; // Nama gambar baru sesuai title

                // Pindahkan gambar lama ke nama baru
                File::move('assets/images/our-partner/' . $oldImageName, 'assets/images/our-partner/' . $nama_gambar);

                // Simpan nama gambar baru di validatedData
                $validatedData['gambar'] = $nama_gambar;
            }

            OurPartner::where('id', $id)->update($validatedData);
            return redirect('/dashboard/our-partner')->with('success', 'Gambar Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/our-partner')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = OurPartner::findOrFail($id);
        try {
            OurPartner::destroy($file->id);
            File::delete('assets/images/our-partner/' . $file->gambar);
            return redirect('/dashboard/our-partner')->with('success', 'Gambar Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/our-partner')->with('error', 'Gagal Menghapus. Silakan Coba Lagi.');
        }
    }
}
