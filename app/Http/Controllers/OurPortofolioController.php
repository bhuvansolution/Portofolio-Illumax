<?php

namespace App\Http\Controllers;

use App\Models\OurPortofolio;
use App\Models\PortofolioPage;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OurPortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = OurPortofolio::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }
        if ($request->has('status')) {
            $status = $request->input('status');
            $query->where('status', $status);
        }
        $info = $query->paginate(10);

        return view('dashboard.portofolio.portofolio', [
            'title' => 'Portofolio',
            'porto' => PortofolioPage::firstOrFail(),
            'portofolio' => $info->appends([
                'search' => $request->input('search'),
                'status' => $request->input('status'),
            ]),
        ]);
    }
    public function changeStatus($id, $status)
    {
        if (!in_array($status, ['Publish', 'Draft'])) {
            abort(404);
        }

        $data = OurPortofolio::findOrFail($id);
        $data->status = $status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.portofolio.add', [
            'title' => 'Add Portofolio',
            'portofolio' => OurPortofolio::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:our_portofolios',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp|max:5120',
            'video' => 'required|mimes:mp4,mov,ogg,qt,webm|max:51200',
            'description' => 'required',
            'status' => 'required|in:Draft,Publish',
        ]);

        if ($request->hasFile('gambar')) {
            // Mulai transaksi database
            DB::beginTransaction();
            try {
                $gambar = $request->file('gambar');
                $nama_gambar = $request->title . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/portofolio', $nama_gambar);

                // Menambahkan nama file ke array validatedData
                $validatedData['gambar'] = $nama_gambar;

                $video = $request->file('video');
                $nama_video = $request->title . '.' . $video->getClientOriginalExtension();
                $video->move('assets/video/portofolio', $nama_video);

                // Menambahkan nama file ke array validatedData
                $validatedData['video'] = $nama_video;

                // Menyimpan data ke database
                OurPortofolio::create($validatedData);

                // Commit transaksi jika semuanya berhasil
                DB::commit();

                return redirect('/dashboard/our-portofolio')->with('success', 'Data Baru Berhasil di Tambahkan');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Hapus file yang sudah diupload jika terjadi error
                if (file_exists(public_path('assets/images/portofolio/' . $nama_gambar))) {
                    unlink(public_path('assets/images/portofolio/' . $nama_gambar));
                }

                // Hapus file yang sudah diupload jika terjadi error
                if (file_exists(public_path('assets/video/portofolio/' . $nama_video))) {
                    unlink(public_path('assets/video/portofolio/' . $nama_video));
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
    public function show(OurPortofolio $ourPortofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurPortofolio $ourPortofolio)
    {
        return view('dashboard.portofolio.edit', [
            'title' => 'Edit Portofolio',
            'portofolio' => $ourPortofolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $portofolio = OurPortofolio::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:our_portofolios,slug,' . $id,
            'gambar' => 'image|mimes:jpg,png,jpeg,webp|max:5120',
            'status' => 'required|in:Draft,Publish',
        ]);

        try {
            if ($request->has('gambar')) {
                File::delete('assets/images/portofolio/' . $portofolio->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = $request->nfile . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/portofolio', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                unset($validatedData['gambar']);
            }

            if ($request->has('video')) {
                File::delete('assets/video/portofolio/' . $portofolio->video);
                $video = $request->file('video');
                $nama_video = $request->nfile . '.' . $video->getClientOriginalExtension();
                $video->move('assets/video/portofolio', $nama_video);
                $validatedData['video'] = $nama_video;
            } else {
                unset($validatedData['video']);
            }

            OurPortofolio::where('id', $id)->update($validatedData);
            return redirect('/dashboard/our-portofolio')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/our-portofolio')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = OurPortofolio::findOrFail($id);
        try {
            OurPortofolio::destroy($file->id);
            File::delete('assets/images/portofolio/' . $file->gambar);
            File::delete('assets/video/portofolio/' . $file->video);
            return redirect('/dashboard/our-portofolio')->with('success', 'Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/our-portofolio')->with('error', 'Gagal Menghapus. Silakan Coba Lagi.');
        }
    }

    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(OurPortofolio::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
