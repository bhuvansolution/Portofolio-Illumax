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
            'description' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'vgambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'mgambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        try {
            // === HAPUS GAMBAR JIKA DIMINTA ===
            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/aboutus/' . $file->gambar);
                $validatedData['gambar'] = null;
            }

            if ($request->hapus_vgambar == 1 && $file->vgambar) {
                File::delete('assets/images/aboutus/' . $file->vgambar);
                $validatedData['vgambar'] = null;
            }

            if ($request->hapus_mgambar == 1 && $file->mgambar) {
                File::delete('assets/images/aboutus/' . $file->mgambar);
                $validatedData['mgambar'] = null;
            }

            // === UPLOAD GAMBAR JIKA ADA ===
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/aboutus/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'about-us.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/aboutus', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            }

            if ($request->hasFile('vgambar')) {
                File::delete('assets/images/aboutus/' . $file->vgambar);
                $vgambar = $request->file('vgambar');
                $nama_vgambar = 'visi.' . $vgambar->getClientOriginalExtension();
                $vgambar->move('assets/images/aboutus', $nama_vgambar);
                $validatedData['vgambar'] = $nama_vgambar;
            }

            if ($request->hasFile('mgambar')) {
                File::delete('assets/images/aboutus/' . $file->mgambar);
                $mgambar = $request->file('mgambar');
                $nama_mgambar = 'misi.' . $mgambar->getClientOriginalExtension();
                $mgambar->move('assets/images/aboutus', $nama_mgambar);
                $validatedData['mgambar'] = $nama_mgambar;
            }

            Aboutus::where('id', $id)->update($validatedData);

            return redirect('/dashboard/aboutus')->with('success', 'File Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/aboutus')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
