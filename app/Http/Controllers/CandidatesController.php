<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidatesController extends Controller
{
    public function index()
    {
        $candidates = Candidate::where('show','=',1)->orderBy('rate','asc')->get();
        return view('candidates',['candidates' => $candidates]);
    }

    public function createForm()
    {
        return view('createCandidate');
    }
    public function createProcess(Request $request)
    {
        try{
            $valid = $request->validate([
                'name' => 'required|string|unique:candidates',
                'email' => 'required|email',
                'photo' => 'required|mimes:jpg,bmp,png,avif',
            ]);
            $path = $request->file('photo')->store('candidates','public');
            Candidate::create([
                'name' => $valid['name'],
                'email' => $valid['email'],
                'photo' => $path,
                'show' => 0,
                'rate' => rand(1,10)
            ]);
        }catch (\Exception $e){
            return redirect(route('main'));
        }
        return redirect()->back()->with('message','Заявка принята');
    }
}
