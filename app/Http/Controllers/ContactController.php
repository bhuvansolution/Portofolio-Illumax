<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.contact.contact', [
            'title' => 'Contact us',
            'contact' => Contact::firstOrFail()
        ]);
    }

    public function update(Request $request,  $id)
    {
        $file = Contact::where('id', $id)->firstOrFail();
        $validatedData = $request->validate([
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email',
            'office' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:5120',
            'gambar1' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:5120',
            'textatas' => 'required',
            'textbawah' => 'required',
            'engtextatas' => 'required',
            'engtextbawah' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
        ]);

        try {
            // === HAPUS GAMBAR JIKA DIMINTA ===
            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/contact/' . $file->gambar);
                $validatedData['gambar'] = null;
            }

            if ($request->hapus_gambar1 == 1 && $file->gambar1) {
                File::delete('assets/images/contact/' . $file->gambar1);
                $validatedData['gambar1'] = null;
            }

            // === UPLOAD GAMBAR JIKA ADA ===

            if ($request->hasFile('gambar')) {
                File::delete('assets/images/contact/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'contact.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/contact', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            }

            if ($request->hasFile('gambar1')) {
                File::delete('assets/images/contact/' . $file->gambar1);
                $gambar1 = $request->file('gambar1');
                $nama_gambar1 = 'contact1.' . $gambar1->getClientOriginalExtension();
                $gambar1->move('assets/images/contact', $nama_gambar1);
                $validatedData['gambar1'] = $nama_gambar1;
            }

            Contact::where('id', $id)->update($validatedData);

            return redirect('/dashboard/contact')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            // Hapus file yang sudah diupload jika terjadi error
            if (file_exists(public_path('assets/images/contact/' . $nama_gambar))) {
                unlink(public_path('assets/images/contact/' . $nama_gambar));
            }
            return redirect('/dashboard/contact')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
