<?php

namespace App\Http\Controllers;

use App\Models\PortofolioPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortofolioPageController extends Controller
{
    public function update(Request $request,  $id)
    {
        $file = PortofolioPage::where('id', $id)->firstOrFail();
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:5120',
            'gambar1' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:5120',
            'textatas' => 'required',
            'engtextatas' => 'required',
        ]);

        try {
            // === HAPUS GAMBAR JIKA DIMINTA ===
            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/portopage/' . $file->gambar);
                $validatedData['gambar'] = null;
            }

            if ($request->hapus_gambar1 == 1 && $file->gambar1) {
                File::delete('assets/images/portopage/' . $file->gambar1);
                $validatedData['gambar1'] = null;
            }

            // === UPLOAD GAMBAR JIKA ADA ===

            if ($request->hasFile('gambar')) {
                File::delete('assets/images/portopage/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'portopage.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/portopage', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            }

            if ($request->hasFile('gambar1')) {
                File::delete('assets/images/portopage/' . $file->gambar1);
                $gambar1 = $request->file('gambar1');
                $nama_gambar1 = 'portopage1.' . $gambar1->getClientOriginalExtension();
                $gambar1->move('assets/images/portopage', $nama_gambar1);
                $validatedData['gambar1'] = $nama_gambar1;
            }

            PortofolioPage::where('id', $id)->update($validatedData);

            return redirect('/dashboard/our-portofolio')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            // Hapus file yang sudah diupload jika terjadi error
            if (file_exists(public_path('assets/images/portopage/' . $nama_gambar))) {
                unlink(public_path('assets/images/portopage/' . $nama_gambar));
            }
            return redirect('/dashboard/our-portofolio')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
