<?php

namespace App\Http\Controllers;

use App\Models\WhyChoose;
use Illuminate\Http\Request;

class WhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whychoose = WhyChoose::firstOrFail();

        $whychoose->title = json_decode($whychoose->title);
        $whychoose->description = json_decode($whychoose->description);
        $whychoose->engtitle = json_decode($whychoose->engtitle);
        $whychoose->engdescription = json_decode($whychoose->engdescription);
        $whychoose->gambar = json_decode($whychoose->gambar);
        return view('dashboard.whychoose.whychoose', [
            'title' => ' Why Choose',
            'whychoose' => $whychoose
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title.*' => 'nullable',
            'description.*' => 'nullable',
            'engtitle.*' => 'nullable',
            'engdescription.*' => 'nullable',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $whyChoose = WhyChoose::findOrFail($id);

        // Ambil gambar lama dari database
        $oldgambar = $whyChoose->gambar ? json_decode($whyChoose->gambar, true) : [];

        // Proses upload gambar baru
        $newgambar = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                if ($gambar->isValid()) {
                    $filename = time() . '_' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('assets/images/whychoose'), $filename);
                    $newgambar[] = $filename;
                }
            }
        }

        // Gabungkan gambar lama dan baru
        $allImages = array_merge($oldgambar, $newgambar);
        $validatedData['gambar'] = json_encode($allImages);

        // Filter data lainnya
        $validatedData['title'] = json_encode(array_values(array_filter($request->title, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['description'] = json_encode(array_values(array_filter($request->description, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engtitle'] = json_encode(array_values(array_filter($request->engtitle, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engdescription'] = json_encode(array_values(array_filter($request->engdescription, fn($v) => !is_null($v) && $v !== '')));

        try {
            $whyChoose->update($validatedData);
            return redirect('/dashboard/why-choose')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/why-choose')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
