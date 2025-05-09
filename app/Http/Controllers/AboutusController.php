<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.aboutus.about', [
            'title' => 'About Us',
            'aboutus' => Aboutus::firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $file = Aboutus::where('id', $id)->firstOrFail();

        $validatedData = $request->validate([
            'textatas' => 'required',
            'judul' => 'required',
            'description' => 'required',
            'textbawah' => 'required',
            'engtextatas' => 'required',
            'engjudul' => 'required',
            'engdescription' => 'required',
            'engtextbawah' => 'required',
            'banneratas' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'bannerbawah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        try {
            // === HAPUS GAMBAR JIKA DIMINTA ===
            if ($request->hapus_banneratas == 1 && $file->banneratas) {
                File::delete('assets/images/aboutus/' . $file->banneratas);
                $validatedData['banneratas'] = null;
            }

            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/aboutus/' . $file->gambar);
                $validatedData['gambar'] = null;
            }

            if ($request->hapus_gambar1 == 1 && $file->gambar1) {
                File::delete('assets/images/aboutus/' . $file->gambar1);
                $validatedData['gambar1'] = null;
            }

            if ($request->hapus_bannerbawah == 1 && $file->bannerbawah) {
                File::delete('assets/images/aboutus/' . $file->bannerbawah);
                $validatedData['bannerbawah'] = null;
            }

            // === UPLOAD GAMBAR JIKA ADA ===
            if ($request->hasFile('banneratas')) {
                File::delete('assets/images/aboutus/' . $file->banneratas);
                $banneratas = $request->file('banneratas');
                $nama_banneratas = 'banneratas.' . $banneratas->getClientOriginalExtension();
                $banneratas->move('assets/images/aboutus', $nama_banneratas);
                $validatedData['banneratas'] = $nama_banneratas;
            }

            if ($request->hasFile('gambar')) {
                File::delete('assets/images/aboutus/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'about-us.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/aboutus', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            }

            if ($request->hasFile('gambar1')) {
                File::delete('assets/images/aboutus/' . $file->gambar1);
                $gambar1 = $request->file('gambar1');
                $nama_gambar1 = 'about-us1.' . $gambar1->getClientOriginalExtension();
                $gambar1->move('assets/images/aboutus', $nama_gambar1);
                $validatedData['gambar1'] = $nama_gambar1;
            }

            if ($request->hasFile('bannerbawah')) {
                File::delete('assets/images/aboutus/' . $file->bannerbawah);
                $bannerbawah = $request->file('bannerbawah');
                $nama_bannerbawah = 'bannerbawah.' . $bannerbawah->getClientOriginalExtension();
                $bannerbawah->move('assets/images/aboutus', $nama_bannerbawah);
                $validatedData['bannerbawah'] = $nama_bannerbawah;
            }

            Aboutus::where('id', $id)->update($validatedData);

            return redirect('/dashboard/aboutus')->with('success', ' Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/aboutus')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
