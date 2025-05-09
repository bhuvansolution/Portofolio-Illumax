<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.home.home', [
            'title' => 'Home Page',
            'homepage' => HomePage::firstOrFail()
        ]);
    }

    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'gambar' => 'nullable|array', // Pastikan gambar berupa array
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:5048', // Validasi untuk setiap file
        ]);

        $folderPath = public_path('assets\images\banner');
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true); // Membuat folder dengan izin 0777
        }
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Ambil data produk yang akan di-update
            $homepage = HomePage::findOrFail($id);
            $existingImages = json_decode($homepage->gambar, true) ?? []; // Gambar lama

            // Cek jika ada gambar baru
            $newImages = [];
            if ($request->hasFile('gambar')) {
                // Loop untuk menyimpan setiap file gambar yang di-upload
                foreach ($request->file('gambar') as $index => $file) {
                    // Buat nama gambar unik (misalnya tambahkan index atau timestamp agar tidak bentrok)
                    $nama_gambar = uniqid('banner' . '-') . '.' . $file->getClientOriginalExtension();

                    // Pindahkan file ke folder yang sudah dibuat
                    $file->move($folderPath, $nama_gambar);
                    // Simpan nama gambar ke array baru
                    $newImages[] = $nama_gambar;
                }
            }

            // Proses gambar yang dihapus oleh user
            $deletedImages = $request->input('deleted_images') ? explode(',', $request->input('deleted_images')) : [];
            foreach ($deletedImages as $image) {
                $path = public_path('assets/images/banner/' . $image);
                if (file_exists($path)) {
                    unlink($path);
                }
                if (($key = array_search($image, $existingImages)) !== false) {
                    unset($existingImages[$key]);
                }
            }
            // Gabungkan gambar lama (yang tidak dihapus) dengan yang baru
            $allImages = array_merge(array_values($existingImages), $newImages);
            $validatedData['gambar'] = json_encode($allImages);
            // Update data produk ke database
            $homepage->update($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/homepage/create')->with('success', 'Berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/homepage')->with('success', 'Berhasil di Update');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            // Hapus file yang sudah diupload jika terjadi error
            // Hapus file baru yang sudah diupload jika terjadi error
            foreach ($newImages as $gambar) {
                if (file_exists(public_path('assets/images/banner/' . $gambar))) {
                    unlink(public_path('assets/images/banner/' . $gambar));
                }
            }
            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->with(['error' => 'Terjadi kesalahan, Silahkan coba lagi.']);
        }
    }
}
