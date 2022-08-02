<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateEditController extends Controller
{
    public function allCandidate()
    {
        $all = Candidate::all();
        return view('admin.allCandidate', ['candidates' => $all]);
    }

    public function editForm($id)
    {
        $data = Candidate::where('id', '=', $id)->get();
        return view('admin.editForm', ['cat' => $data]);
    }

    public function edit(Request $request)
    {
        try {
            $cat = Candidate::where('id', '=', $request->input('id'))->get();
            $path = $cat[0]['photo'];
            if ($request->file('photo') !== null) {
                $path = $request->file('photo')->store('candidates', 'public');
            }
            if ($request->input('show') != null) {
                $status = 1;
            } else {
                $status = 0;
            }
            Candidate::where('id', '=', $request->input('id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'show' => $status,
                'photo' => $path,
                'rate' => $request->input('rate')
            ]);
        } catch (\Exception $e) {
            return redirect(route('main'));
        }
        return redirect()->back()->with('message', 'Измененно!');
    }

    public function delete(Request $request)
    {
        Candidate::where('id', '=', $request->input('id'))->delete();
        return redirect(route('allCandidate'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('main'));
    }
}
