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
        $oldIcons = json_decode($service->icon, true) ?? [];
        $newIcons = $oldIcons;

        // Proses upload icon baru dan hapus icon lama
        if ($request->hasFile('icon')) {
            foreach ($request->file('icon') as $index => $iconFile) {
                if ($iconFile->isValid()) {
                    if (isset($oldIcons[$index])) {
                        $oldPath = public_path('assets/images/service/' . $oldIcons[$index]);
                        if (file_exists($oldPath)) {
                            File::delete($oldPath);
                        }
                        unset($newIcons[$index]);
                    }

                    $newFileName = time() . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
                    $iconFile->move(public_path('assets/images/service'), $newFileName);
                    $newIcons[$index] = $newFileName;
                }
            }
        }

        // Hapus icon yang dikosongkan
        if ($request->has('icon')) {
            foreach ($request->icon as $index => $value) {
                if (!$request->hasFile("icon.$index")) {
                    unset($newIcons[$index]);
                }
            }
        }

        // Sinkronisasi ICON dan TEXT
        $texts = $request->text ?? [];
        $icons = $newIcons;
        $filteredTexts = [];
        $filteredIcons = [];

        foreach ($texts as $index => $textValue) {
            $textValue = trim($textValue);
            if ($textValue !== '' && isset($icons[$index]) && $icons[$index] !== '') {
                $filteredTexts[] = $textValue;
                $filteredIcons[] = $icons[$index];
            } elseif (isset($icons[$index])) {
                // Jika icon ada tapi text kosong, hapus icon
                $oldPath = public_path('assets/images/service/' . $icons[$index]);
                if (file_exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
        }

        $validatedData['icon'] = json_encode(array_values($filteredIcons));
        $validatedData['text'] = json_encode(array_values($filteredTexts));

        // Data lain tetap diproses seperti biasa
        $validatedData['title'] = json_encode(array_values(array_filter($request->title ?? [], fn($v) => !is_null($v) && $v !== '')));
        $validatedData['description'] = json_encode(array_values(array_filter($request->description ?? [], fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engtitle'] = json_encode(array_values(array_filter($request->engtitle ?? [], fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engdescription'] = json_encode(array_values(array_filter($request->engdescription ?? [], fn($v) => !is_null($v) && $v !== '')));
        $validatedData['engtext'] = json_encode(array_values(array_filter($request->engtext ?? [], fn($v) => !is_null($v) && $v !== '')));

        try {
            // Hapus gambar jika diminta
            if ($request->hapus_gambar == 1 && $file->gambar) {
                File::delete('assets/images/service/' . $file->gambar);
                $validatedData['gambar'] = null;
            }

            // Upload gambar baru jika ada
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
            if (isset($nama_gambar) && file_exists(public_path('assets/images/service/' . $nama_gambar))) {
                unlink(public_path('assets/images/service/' . $nama_gambar));
            }
            return redirect('/dashboard/our-service')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
