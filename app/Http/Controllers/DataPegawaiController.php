<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\{
    User,
    Pegawai
};
use App\Models\Views\{
    VPegawai
};
use Illuminate\Support\Facades\Auth;

class DataPegawaiController extends Controller
{
    public function index()
    {
        return view('DataPegawai.index');
    }

    public function listPegawai(Request $request)
    {
        $data = VPegawai::
        where(function($q) use($request){
            if($request->has('search') && $request->search != ""){
                $q->whereRaw('LOWER(nama_lengkap) LIKE ?', ['%'.trim(strtolower($request->search)).'%']);
                $q->orWhereRaw('LOWER(email) LIKE ?', ['%'.trim(strtolower($request->search)).'%']);
                $q->orWhereRaw('LOWER(nip) LIKE ?', ['%'.trim(strtolower($request->search)).'%']);
            }
        })
        ->paginate($request->pageSize);

        //Hanya untuk dummy
        $data->getCollection()->transform(function ($user) {
            $user->jabatan_terkini = "Auditor Ahli Madya";
            $user->tmt_jabatan_terkini = "2024-01-01";
            $user->pangkat_terkini = "IV\b";
            $user->tmt_pangkat_terkini = "2024-01-01";
            return $user;
        });
        
        return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    }
}
