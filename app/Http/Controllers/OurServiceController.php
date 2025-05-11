<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = OurService::firstOrFail();

        $service->title = json_decode($service->title);
        $service->description = json_decode($service->description);
        $service->engtitle = json_decode($service->engtitle);
        $service->engdescription = json_decode($service->engdescription);
        return view('dashboard.service.service', [
            'title' => 'Our Service',
            'service' => $service
        ]);
    }


    public function update(Request $request, $id)
    {
        $file = OurService::where('id', $id)->firstOrFail();
        $validatedData = $request->validate([
            'title.*' => 'nullable',
            'description.*' => 'nullable',
            'engtitle.*' => 'nullable',
            'engdescription.*' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:5120',
            'textatas' => 'required',
            'engtextatas' => 'required',
        ]);

        // Filter input yang kosong
        $filteredtitle = array_filter($request->title, function ($value) {
            return !is_null($value) && $value !== '';
        });

        $filtereddescription = array_filter($request->description, function ($value) {
            return !is_null($value) && $value !== '';
        });

        // Gunakan hasil filter
        $validatedData['title'] = json_encode(array_values($filteredtitle));
        $validatedData['description'] = json_encode(array_values($filtereddescription));

        try {
            // === HAPUS GAMBAR JIKA DIMINTA ===
            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/contact/' . $file->gambar);
                $validatedData['gambar'] = null;
            }
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/service/' . $file->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'service.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images/service', $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            }
            OurService::where('id', $id)->update($validatedData);
            return redirect('/dashboard/our-service')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            // Hapus file yang sudah diupload jika terjadi error
            if (file_exists(public_path('assets/images/service/' . $nama_gambar))) {
                unlink(public_path('assets/images/service/' . $nama_gambar));
            }
            return redirect('/dashboard/our-service')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
