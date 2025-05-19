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
        $service->icon = json_decode($service->icon);
        $service->text = json_decode($service->text);
        $service->engtext = json_decode($service->engtext);
        return view('dashboard.service.service', [
            'title' => 'Our Service',
            'service' => $service
        ]);
    }


    public function update(Request $request, $id)
    {
        $file = OurService::where('id', $id)->firstOrFail();
        $validatedData = $request->validate([
            'brand' => 'nullable',
            'engbrand' => 'nullable',
            'title.*' => 'nullable',
            'description.*' => 'nullable',
            'engtitle.*' => 'nullable',
            'engdescription.*' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:5120',
            'textatas' => 'required',
            'engtextatas' => 'required',
            'text.*' => 'nullable',
            'engtext.*' => 'nullable',
            'icon' => 'nullable|array',
            'icon.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $service = OurService::findOrFail($id);
        // Ambil gambar lama dari database
        $oldicon = $service->icon ? json_decode($service->icon, true) : [];

        // Proses upload icon baru
        $newicon = [];
        if ($request->hasFile('icon')) {
            foreach ($request->file('icon') as $icon) {
                if ($icon->isValid()) {
                    $filename = time() . '_' . $icon->getClientOriginalName();
                    $icon->move(public_path('assets/images/service'), $filename);
                    $newicon[] = $filename;
                }
            }
        }

        // Gabungkan icon lama dan baru
        $allicon = array_merge($oldicon, $newicon);
        $validatedData['icon'] = json_encode($allicon);

        // Filter data lainnya
        $validatedData['title'] = json_encode(array_values(array_filter($request->title, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['description'] = json_encode(array_values(array_filter($request->description, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engtitle'] = json_encode(array_values(array_filter($request->engtitle, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engdescription'] = json_encode(array_values(array_filter($request->engdescription, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['text'] = json_encode(array_values(array_filter($request->text, fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engtext'] = json_encode(array_values(array_filter($request->engtext, fn($v) => !is_null($v) && $v !== '')));

        try {
            // === HAPUS GAMBAR JIKA DIMINTA ===
            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/service/' . $file->gambar);
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
