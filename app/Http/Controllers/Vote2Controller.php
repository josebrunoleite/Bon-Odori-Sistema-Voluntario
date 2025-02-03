<?php

namespace App\Http\Controllers;

use App\Models\Vote2;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Vote2Controller extends Controller
{
    /**
     * Show the form for voting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vote2.index2');
    }

    /**
     * Store the user's vote.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'code' => 'required|string',
            'rissa' => 'required|string|in:Sim,Nao',
            'aecio' => 'required|string|in:Sim,Nao',
            'jhon' => 'required|string|in:Sim,Nao',
        ]);
    
        if (Vote2::where('user_code', $request->code)->exists()) {
            return back()->with('error', 'Você já votou!');
        }
    
        if (Vote2::where('ip_address', $request->ip())->exists()) {
            return back()->with('error', 'Você já votou deste endereço IP!');
        }
    
        // Logic to validate the code and store the vote
        $data = json_decode(Storage::get('codigos_presenca.json'), true);
        $email = null;
        foreach ($data['codigos'] as $codigo) {
            if ($codigo['codigo'] == $request->code) {
                $email = $codigo['email'];
                break;
            }
        }
    
        if (!$email) {
            return back()->with('error', 'Invalid code!');
        }
    
        $vote = new Vote2();
        $vote->user_code = $request->code;
        $vote->Rissa = $request->rissa;
        $vote->Aecio = $request->aecio;
        $vote->Jhon = $request->jhon;
        $vote->ip_address = $request->ip(); // Save the IP address
        $vote->save();
    
        return redirect()->route('certificate.show', ['code' => $request->code]);
    }
    /**
     * Show the voting certificate.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function showCertificate($code)
    {
        $vote = Vote2::where('user_code', $code)->firstOrFail();

        return view('vote2.certificate', ['code' => $code, 'option' => $vote]);
    }

    /**
     * Show the voting results.
     *
     * @return \Illuminate\Http\Response
     */
    public function resultado()
    {
        $currentDateTime = Carbon::now();
        $releaseDateTime = Carbon::parse('2024-02-03 12:00:00');
    
        if ($currentDateTime->lessThan($releaseDateTime)) {
            $remainingTime = $currentDateTime->diffForHumans($releaseDateTime, [
                'parts' => 3,
                'short' => true,
                'syntax' => Carbon::DIFF_ABSOLUTE,
            ]);
            return redirect()->route('vote.index')->with('error', 'Os resultados estarão disponíveis em ' . $remainingTime);
        }
    
        $results = [
            'Rissa' => Vote2::select('Rissa', DB::raw('count(*) as total'))
                            ->groupBy('Rissa')
                            ->get(),
            'Aecio' => Vote2::select('Aecio', DB::raw('count(*) as total'))
                            ->groupBy('Aecio')
                            ->get(),
            'Jhon' => Vote2::select('Jhon', DB::raw('count(*) as total'))
                            ->groupBy('Jhon')
                            ->get(),
        ];
    
        return view('vote2.resultado', ['results' => $results]);
    }

    /**
     * Show the manage votes page.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageVotes()
    {
        $votes = Vote2::all();
        $data = json_decode(Storage::get('codigos_presenca.json'), true);
    
        foreach ($votes as $vote) {
            foreach ($data['codigos'] as $codigo) {
                if ($codigo['codigo'] == $vote->user_code) {
                    $vote->email = $codigo['email'] ?? 'N/A';
                    break;
                }
            }
        }
    
        return view('vote.manage_votes', ['votes' => $votes]);
    }

    /**
     * Remove the specified vote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVote($id)
    {
        $vote = Vote2::findOrFail($id);
        $vote->delete();

        return redirect()->route('votes.manage')->with('success', 'Vote removed successfully.');
    }
}