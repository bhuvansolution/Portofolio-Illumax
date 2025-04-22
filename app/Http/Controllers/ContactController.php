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
        $contact = Contact::where('id', $id)->firstOrFail();
        $validatedData = $request->validate([
            'whatsapp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'web' => 'required|url',
            'gambar' => 'nullable',
        ]);

        try {
            if ($request->has('gambar')) {
                File::delete('assets/images/contact/' . $contact->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'contactus' . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/contact', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Jika tidak ada gambar baru, ganti nama gambar lama mengikuti title baru
                $oldImageName = $contact->gambar;
                $extension = pathinfo($oldImageName, PATHINFO_EXTENSION); // Ambil ekstensi gambar lama
                $nama_gambar = 'contactus' . '.' . $extension; // Nama gambar baru sesuai title

                // Pindahkan gambar lama ke nama baru
                File::move('assets/images/contact/' . $oldImageName, 'assets/images/contact/' . $nama_gambar);

                // Simpan nama gambar baru di validatedData
                $validatedData['gambar'] = $nama_gambar;
            }

            Contact::where('id', $id)->update($validatedData);
            return redirect('/dashboard/contact')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/contact')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
