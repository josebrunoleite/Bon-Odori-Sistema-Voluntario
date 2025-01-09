<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

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
            'option' => 'required|string|in:option1,option2,option3',
        ]);

        // Logic to validate the code and store the vote
        $vote = new Vote();
        $vote->user_code = $request->code;
        $vote->choice = $request->option;
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
        return view('certificate', ['code' => $code]);
    }
}