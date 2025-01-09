<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VoteController extends Controller
{
    /**
     * Show the form for voting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vote.index');
    }

    /**
     * Store the user's vote.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'option' => 'required|string|in:Ananda,Diana,Lucas',
        ]);

        if (Vote::where('user_code', $request->code)->exists()) {
            return back()->with('error', 'You have already voted!');
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

        $vote = new Vote();
        $vote->user_code = $request->code;
        $vote->choice = $request->option;
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
        $vote = Vote::where('user_code', $code)->firstOrFail();
        return view('vote.certificate', ['code' => $code, 'option' => $vote->choice]);
    }

    /**
     * Show the voting results.
     *
     * @return \Illuminate\Http\Response
     */
    public function resultado()
    {
        $currentDateTime = Carbon::now();
        $releaseDateTime = Carbon::parse('2025-01-11 17:00:00');

        if ($currentDateTime->lessThan($releaseDateTime)) {
            $remainingTime = $currentDateTime->diffForHumans($releaseDateTime, [
                'parts' => 3,
                'short' => true,
                'syntax' => Carbon::DIFF_ABSOLUTE,
            ]);
            return redirect()->route('vote.index')->with('error', 'Os resultados estarão disponíveis em ' . $remainingTime);
        }

        $results = Vote::select('choice', DB::raw('count(*) as total'))
                        ->groupBy('choice')
                        ->get();

        return view('vote.resultado', ['results' => $results]);
    }

    /**
     * Show the manage votes page.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageVotes()
    {
        $votes = Vote::all();
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
        $vote = Vote::findOrFail($id);
        $vote->delete();

        return redirect()->route('votes.manage')->with('success', 'Vote removed successfully.');
    }
}