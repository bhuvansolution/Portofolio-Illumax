<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Http\Request;

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
        return view('dashboard.service.service', [
            'title' => 'Data Our Service',
            'service' => $service
        ]);
    }


    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'title.*' => 'nullable',
            'description.*' => 'nullable',
        ]);

        // Filter data yang tidak null atau kosong
        $filteredtitle = array_filter($request->title, function ($value) {
            return !is_null($value) && $value !== '';
        });

        $filtereddescription = array_filter($request->description, function ($value) {
            return !is_null($value) && $value !== '';
        });

        $validatedData['title'] = json_encode(array_values($filteredtitle));
        $validatedData['description'] = json_encode(array_values($filtereddescription));

        try {
            // Simpan lokasi, alamat, dan telepon sebagai JSON
            $validatedData['title'] = json_encode($request->title);
            $validatedData['description'] = json_encode($request->description);

            OurService::where('id', $id)->update($validatedData);
            return redirect('/dashboard/our-service')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/our-service')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
