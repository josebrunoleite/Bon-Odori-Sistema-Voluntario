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
        $currentDateTime = Carbon::now();
        $startDateTime = Carbon::parse('2025-07-04 13:00:00');
        $endDateTime = Carbon::parse('2025-07-04 19:00:00');

        if ($currentDateTime->lessThan($startDateTime)) {
            $remainingTime = $currentDateTime->diffForHumans($startDateTime, [
                'parts' => 3,
                'short' => true,
                'syntax' => Carbon::DIFF_ABSOLUTE,
            ]);
            return redirect()->route('vote.index')->with('error', 'A votação começará em ' . $remainingTime);
        } elseif ($currentDateTime->greaterThan($endDateTime)) {
            return redirect()->route('vote.index')->with('error', 'A votação já terminou.');
        }

        $request->validate([
            'code' => 'required|string',
            'fernanda' => 'required|string|in:Sim,Nao',
            'alice' => 'required|string|in:Sim,Nao',
            'giovanna' => 'required|string|in:Sim,Nao',
            'felipe' => 'required|string|in:Sim,Nao',
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
        $vote->Fernanda = $request->fernanda;
        $vote->Alice = $request->alice;
        $vote->Giovanna = $request->giovanna;
        $vote->Felipe = $request->felipe;
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
        $releaseDateTime = Carbon::parse('2025-07-04 20:00:00');
    
        if ($currentDateTime->lessThan($releaseDateTime)) {
            $remainingTime = $currentDateTime->diffForHumans($releaseDateTime, [
                'parts' => 3,
                'short' => true,
                'syntax' => Carbon::DIFF_ABSOLUTE,
            ]);
            return redirect()->route('vote.index')->with('error', 'Os resultados estarão disponíveis em ' . $remainingTime);
        }
    
        $results = [
            'Fernanda' => Vote2::select('Fernanda', DB::raw('count(*) as total'))
                            ->groupBy('Fernanda')
                            ->get(),
            'Alice' => Vote2::select('Alice', DB::raw('count(*) as total'))
                            ->groupBy('Alice')
                            ->get(),
            'Giovanna' => Vote2::select('Giovanna', DB::raw('count(*) as total'))
                            ->groupBy('Giovanna')
                            ->get(),
            'Felipe' => Vote2::select('Felipe', DB::raw('count(*) as total'))
                            ->groupBy('Felipe')
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
        $options = ['Fernanda', 'Alice', 'Giovanna', 'Felipe'];
    
        foreach ($votes as $vote) {
            foreach ($data['codigos'] as $codigo) {
                if ($codigo['codigo'] == $vote->user_code) {
                    $vote->email = $codigo['email'] ?? 'N/A';
                    break;
                }
            }
        }
    
        return view('vote.manage_votes', ['votes' => $votes, 'options' => $options]);
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