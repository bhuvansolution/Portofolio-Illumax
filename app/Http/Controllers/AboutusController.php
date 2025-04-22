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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aboutus $aboutus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aboutus $aboutus)
    {
        //
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'vgambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'mgambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            // Proses gambar About Us
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/aboutus/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'about-us' . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/aboutus', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldImageName = $file->gambar;
                if ($oldImageName) {
                    $extension = pathinfo($oldImageName, PATHINFO_EXTENSION);
                    $nama_gambar = 'about-us' . '.' . $extension;
                    File::move('assets/images/aboutus/' . $oldImageName, 'assets/images/aboutus/' . $nama_gambar);
                    $validatedData['gambar'] = $nama_gambar;
                }
            }

            // Proses gambar Visi
            if ($request->hasFile('vgambar')) {
                File::delete('assets/images/aboutus/' . $file->vgambar);
                $vgambar = $request->file('vgambar');
                $nama_vgambar = 'visi' . '.' . $vgambar->getClientOriginalExtension();
                $vgambar->move('assets/images/aboutus', $nama_vgambar);
                $validatedData['vgambar'] = $nama_vgambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldVImageName = $file->vgambar;
                if ($oldVImageName) {
                    $vextension = pathinfo($oldVImageName, PATHINFO_EXTENSION);
                    $nama_vgambar = 'visi' . '.' . $vextension;
                    File::move('assets/images/aboutus/' . $oldVImageName, 'assets/images/aboutus/' . $nama_vgambar);
                    $validatedData['vgambar'] = $nama_vgambar;
                }
            }

            // Proses gambar Misi
            if ($request->hasFile('mgambar')) {
                File::delete('assets/images/aboutus/' . $file->mgambar);
                $mgambar = $request->file('mgambar');
                $nama_mgambar = 'misi' . '.' . $mgambar->getClientOriginalExtension();
                $mgambar->move('assets/images/aboutus', $nama_mgambar);
                $validatedData['mgambar'] = $nama_mgambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldMImageName = $file->mgambar;
                if ($oldMImageName) {
                    $mextension = pathinfo($oldMImageName, PATHINFO_EXTENSION);
                    $nama_mgambar = 'misi' . '.' . $mextension;
                    File::move('assets/images/aboutus/' . $oldMImageName, 'assets/images/aboutus/' . $nama_mgambar);
                    $validatedData['mgambar'] = $nama_mgambar;
                }
            }
            Aboutus::where('id', $id)->update($validatedData);

            return redirect('/dashboard/aboutus')->with('success', 'File Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/aboutus')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aboutus $aboutus)
    {
        //
    }
}
