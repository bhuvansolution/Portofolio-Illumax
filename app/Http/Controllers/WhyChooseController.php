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
            WhyChoose::where('id', $id)->update($validatedData);
            return redirect('/dashboard/why-choose')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/why-choose')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
