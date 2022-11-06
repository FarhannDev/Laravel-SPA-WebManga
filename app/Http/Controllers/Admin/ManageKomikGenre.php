<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComicGenre;
use Illuminate\Http\Request;

class ManageKomikGenre extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = ComicGenre::orderBy('genre_name', 'DESC')->latest()->get();

        return view('pages.admin.komik.genre.index', [
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComicGenre  $comicGenre
     * @return \Illuminate\Http\Response
     */
    public function show(ComicGenre $comicGenre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComicGenre  $comicGenre
     * @return \Illuminate\Http\Response
     */
    public function edit(ComicGenre $comicGenre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComicGenre  $comicGenre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComicGenre $comicGenre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComicGenre  $comicGenre
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComicGenre $comicGenre)
    {
        //
    }
}
