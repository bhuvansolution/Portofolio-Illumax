<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.user', [
            'title' => 'User Management',
            'users' => User::paginate(5),
            'roles' => Role::all()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole($request->roles);
        return redirect('/dashboard/user-management')->with('success', 'User Berhasil di Tambahkan');
    }
    public function update(Request $request,  $id)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'nullable|min:2'
        ]);
        if ($request->filled('password')) {
            $validator['password'] = Hash::make($validator['password']);
        } else {
            // Jika password tidak diisi, hapus password dari array validator
            unset($validator['password']);
        }
        try {
            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->update($validator);

            if ($request->filled('roles')) {
                $user->assignRole($request->roles); // Menggunakan syncRoles untuk mengganti peran yang ada
            }

            return redirect('/dashboard/user-management')->with('success', 'Data User Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/user-management')->with('error', 'Gagal MengUpdate User. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try {
            User::destroy($user->id);
            return redirect('/dashboard/user-management')->with('success', ' User Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/user-management')->with('error', 'Gagal menghapus User. Silakan coba lagi.');
        }
    }
}
