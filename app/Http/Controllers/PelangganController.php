<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request){
                if (!Auth::check()) {
            return redirect()->route('auth.auth');
        }
            $filterableColumns = ['gender'];
            $searchableColumns = ['first_name','last_name','email']; //sesuai kolom Pelanggan
            $data['dataPelanggan'] = Pelanggan::filter($request, $filterableColumns)
                        ->search($request, $searchableColumns)
                        ->paginate(10)
                        ->withQueryString();
            return view('admin.pelanggan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['birthday']   = $request->birthday;
        $data['gender']     = $request->gender;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $files = $pelanggan->uploads()->get();
        return view('admin.pelanggan.show', compact('pelanggan', 'files'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi optional (boleh ditambah jika perlu)
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'birthday'   => 'required|date',
            'gender'     => 'required',
            'email'      => 'required|email',
            'phone'      => 'required'
        ]);

        // Ambil data berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Data untuk update
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['birthday']   = $request->birthday;
        $data['gender']     = $request->gender;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;

            // Upload multiple files jika ada
        if($request->hasFile('files')) {
            foreach($request->file('files') as $file) {
                $path = $file->store('pelanggan_files', 'public');
                $pelanggan->uploads()->create([
                    'filename' => $path,
                ]);
            }
        }


        // Proses update
        $pelanggan->update($data);

        return redirect()->route('pelanggan.index')->with('success', 'Update Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
