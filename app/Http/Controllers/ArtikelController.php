<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Artikel::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nfile', 'like', "%{$search}%");
        }

        $info = $query->paginate(10);

        return view('dashboard.artikel.artikel', [
            'title' => 'Artikel',
            'artikel' => $info->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.add', [
            'title' => 'Add Artikel',
            'info' => Artikel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:artikels',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',
            'description' => 'required',
        ]);
        if ($request->hasFile('gambar')) {
            // Mulai transaksi database
            DB::beginTransaction();
            try {
                $gambar = $request->file('gambar');
                $nama_gambar = $request->title . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/artikel', $nama_gambar);

                // Menambahkan nama file ke array validatedData
                $validatedData['gambar'] = $nama_gambar;

                // Menyimpan data ke database
                Artikel::create($validatedData);

                // Commit transaksi jika semuanya berhasil
                DB::commit();

                return redirect('/dashboard/artikel')->with('success', 'artikel Baru Berhasil di Tambahkan');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Hapus file yang sudah diupload jika terjadi error
                if (file_exists(public_path('assets/images/artikel/' . $nama_gambar))) {
                    unlink(public_path('assets/images/artikel/' . $nama_gambar));
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
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('dashboard.artikel.edit', [
            'title' => 'Edit Artikel',
            'artikel' => $artikel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $artikel = Artikel::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        try {
            if ($request->has('gambar')) {
                File::delete('assets/images/artikel/' . $artikel->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = $request->nfile . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/artikel', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                unset($validatedData['gambar']);
            }
            Artikel::where('id', $id)->update($validatedData);
            return redirect('/dashboard/artikel')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/artikel')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = Artikel::findOrFail($id);
        try {
            Artikel::destroy($file->id);
            File::delete('assets/images/artikel/' . $file->gambar);
            return redirect('/dashboard/artikel')->with('success', 'Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/artikel')->with('error', 'Gagal Menghapus. Silakan Coba Lagi.');
        }
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Artikel::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
