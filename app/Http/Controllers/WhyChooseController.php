<?php

namespace App\Http\Controllers;

use App\Models\WhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $oldgambars = json_decode($whyChoose->gambar, true) ?? [];
        $newgambars = $oldgambars;

        // Proses upload icon baru dan hapus icon lama
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $index => $gambarFile) {
                if ($gambarFile->isValid()) {
                    if (isset($oldgambars[$index])) {
                        $oldPath = public_path('assets/images/whychoose/' . $oldgambars[$index]);
                        if (file_exists($oldPath)) {
                            File::delete($oldPath);
                        }
                        unset($newgambars[$index]);
                    }

                    $newFileName = time() . '_' . uniqid() . '.' . $gambarFile->getClientOriginalExtension();
                    $gambarFile->move(public_path('assets/images/whychoose'), $newFileName);
                    $newgambars[$index] = $newFileName;
                }
            }
        }

        // Hapus icon yang dikosongkan
        if ($request->has('gambar')) {
            foreach ($request->gambar as $index => $value) {
                if (!$request->hasFile("gambar.$index")) {
                    unset($newgambars[$index]);
                }
            }
        }
        // Sinkronisasi ICON dan TEXT
        $texts = $request->title ?? [];
        $gambars = $newgambars;
        $filteredTexts = [];
        $filteredgambars = [];

        foreach ($texts as $index => $textValue) {
            $textValue = trim($textValue);
            if ($textValue !== '' && isset($gambars[$index]) && $gambars[$index] !== '') {
                $filteredTexts[] = $textValue;
                $filteredgambars[] = $gambars[$index];
            } elseif (isset($gambars[$index])) {
                // Jika gambar ada tapi text kosong, hapus gambar
                $oldPath = public_path('assets/images/whychoose/' . $gambars[$index]);
                if (file_exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
        }

        $validatedData['gambar'] = json_encode(array_values($filteredgambars));
        $validatedData['title'] = json_encode(array_values($filteredTexts));

        // Filter data lainnya
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
