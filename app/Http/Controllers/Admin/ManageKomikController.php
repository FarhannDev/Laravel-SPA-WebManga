<?php

namespace App\Http\Controllers\Admin;

use App\Models\comic;
use App\Models\ComicGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComicVolume;
use Illuminate\Support\Facades\File;

class ManageKomikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('comic_title', 'DESC')->latest()->get();

        return view('pages.admin.komik.index', [
            'comics' => $comics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comics = Comic::latest()->get();
        $genre = ComicGenre::all();

        return view('pages.admin.komik.add', [
            'comics' => $comics,
            'genre'  => $genre,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comic_genre_id' => 'required',
            'comic_title' => 'required|min:6|max:120|unique:comics,comic_title',
            'comic_artist' => 'required',
            'comic_author' => 'required',
            'comic_rating' => 'required',
            'comic_released' => 'required',
            'comic_alternative' => 'required',
            'comic_sinopsis' => 'required',
            'comic_cover' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if (!$request->comic_cover) {
            $generate_slug = Str::slug($request->comic_title, '-');
            $generate_slug .= '.html';

            $data = comic::create([
                'comic_genre_id'         => $request->comic_genre_id,
                'comic_title'            => $request->comic_title,
                'comic_author'           => $request->comic_author,
                'comic_artist'           => $request->comic_artist,
                'comic_rating'           => $request->comic_rating,
                'comic_released'         => $request->comic_released,
                'comic_alternative'      => $request->comic_alternative,
                'comic_sinopsis'         => $request->comic_sinopsis,
                'comic_slug'             => $generate_slug,
                'comic_cover'            => 'default-komik.jpg',
                'created_at'             => new \DateTime(),
                'updated_at'             => new \DateTime(),
            ]);

            if (!is_null($data)) {
                return  redirect()->route('manageKomik')
                    ->with('message_success', 'Berhasil menambahkan komik' . ' ' . $request->comic_title);
            }
        } else {
            $extension = $request->comic_cover->extension();
            $cover_name = md5(uniqid(rand(), true)) . '.' . $extension;
            $path  = $request->comic_cover->move('images/komik/', $cover_name);
            // (is_null($path) ?  $path : $path = []);
            $generate_slug = Str::slug($request->comic_title, '-');
            $generate_slug .= '.html';

            $data = comic::create([
                'comic_genre_id'         => $request->comic_genre_id,
                'comic_title'            => $request->comic_title,
                'comic_author'           => $request->comic_author,
                'comic_artist'           => $request->comic_artist,
                'comic_rating'           => $request->comic_rating,
                'comic_released'         => $request->comic_released,
                'comic_alternative'      => $request->comic_alternative,
                'comic_sinopsis'         => $request->comic_sinopsis,
                'comic_slug'             => $generate_slug,
                'comic_cover'            => (is_null($cover_name) ? 'default-komik.jpg' : $cover_name),
                'created_at'             => new \DateTime(),
                'updated_at'             => new \DateTime(),
            ]);

            if (!is_null($data)) {
                return  redirect()->route('manageKomik')
                    ->with('message_success', 'Berhasil menambahkan komik' . ' ' . $request->comic_title);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(comic $comic)
    {
        $comic->where('comic_slug', $comic->comic_slug)->first();
        $volumes = ComicVolume::where('comic_id', $comic->id)->paginate(5);

        return view('pages.admin.komik.show', ['comic' => $comic, 'volumes' => $volumes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(comic $comic)
    {
        $comic->where('comic_slug', $comic->comic_slug)->first();
        $genre = ComicGenre::all();

        return view('pages.admin.komik.edit', [
            'comic' => $comic,
            'genre'  => $genre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comic $comic)
    {
        $request->validate([
            'comic_genre_id' => 'required',
            'comic_artist' => 'required',
            'comic_author' => 'required',
            'comic_rating' => 'required',
            'comic_released' => 'required',
            'comic_alternative' => 'required',
            'comic_sinopsis' => 'required',
            'comic_cover' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->comic_title != $comic->comic_title) {
            $request->validate(['comic_title' => 'required|min:6|max:120|unique:comics,comic_title']);
        }

        if (!$request->comic_cover) {
            $generate_slug = Str::slug($request->comic_title, '-');
            $generate_slug .= '.html';

            $data = comic::where('comic_slug', $comic->comic_slug)->update([
                'comic_genre_id'         => $request->comic_genre_id,
                'comic_title'            => $request->comic_title,
                'comic_author'           => $request->comic_author,
                'comic_artist'           => $request->comic_artist,
                'comic_rating'           => $request->comic_rating,
                'comic_released'         => $request->comic_released,
                'comic_alternative'      => $request->comic_alternative,
                'comic_sinopsis'         => $request->comic_sinopsis,
                'comic_slug'             => $generate_slug,
                'comic_cover'            => 'default-komik.jpg',
                'is_active'              => 'Publish',
                'updated_at'             => new \DateTime(),
            ]);

            if (!is_null($data)) {
                return  redirect()->route('manageKomik')
                    ->with('message_success', 'Berhasil memperbarui komik' . ' ' . $comic->comic_title);
            }
        } else {
            // Check Cover Komik
            $cover_old = public_path('images/komik/' . $comic->comic_cover);

            if (File::exists($cover_old)) {
                File::delete($cover_old);
            }

            $extension = $request->comic_cover->extension();
            $cover_name = md5(uniqid(rand(), true)) . '.' . $extension;
            $path  = $request->comic_cover->move('images/komik/', $cover_name);

            // (is_null($path) ?  $path : $path = []);
            $generate_slug = Str::slug($request->comic_title, '-');
            $generate_slug .= '.html';

            $data = comic::where('comic_slug', $comic->comic_slug)->update([
                'comic_genre_id'         => $request->comic_genre_id,
                'comic_title'            => $request->comic_title,
                'comic_author'           => $request->comic_author,
                'comic_artist'           => $request->comic_artist,
                'comic_rating'           => $request->comic_rating,
                'comic_released'         => $request->comic_released,
                'comic_alternative'      => $request->comic_alternative,
                'comic_sinopsis'         => $request->comic_sinopsis,
                'comic_slug'             => $generate_slug,
                'comic_cover'            => (is_null($cover_name) ? 'default-komik.jpg' : $cover_name),
                'is_active'              => 'Publish',
                'updated_at'             => new \DateTime(),
            ]);

            if (!is_null($data)) {
                return  redirect()->route('manageKomik')
                    ->with('message_success', 'Berhasil memperbarui komik' . ' ' . $comic->comic_title);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(comic $comic)
    {
        $comic->where('comic_slug', $comic->comic_slug)->first();
        $cover_old = public_path('images/komik/' . $comic->comic_cover);

        if (File::exists($cover_old)) {
            File::delete($cover_old);
        }

        $comic->delete();

        return  redirect()->route('manageKomik')
            ->with('message_success', 'Berhasil menghapus komik' . ' ' . $comic->comic_title);
    }


    public function insert_volumes(Request $request)
    {

        return $request;
    }


    public function delete_volumes($id)
    {
        $volumes = ComicVolume::where('id', $id)->first();
        $volumes->delete();

        return redirect()->route('manageKomik');
    }
}
