<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comic;
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
        $comics = Comic::orderBy('comic_title', 'ASC')->latest()->get();

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
        // dd(json_encode($request->comic_genre));

        $request->validate([
            'comic_title' => 'required|min:6|max:120|unique:comics,comic_title',
            'comic_artist' => 'required',
            'comic_author' => 'required',
            'comic_cover' => 'image|mimes:jpeg,png,jpg|max:2048',
            'comic_status' => 'required',
            'comic_link_cover' => 'required|url'
        ]);

        if (!$request->comic_cover) {
            $generate_slug = Str::slug($request->comic_title, '-');
            $generate_slug .= '.html';

            $data = Comic::create([
                'comic_title'            => $request->comic_title,
                'comic_genre'            => json_encode($request->comic_genre),
                'comic_author'           => $request->comic_author,
                'comic_artist'           => $request->comic_artist,
                'comic_rating'           => $request->comic_rating,
                'comic_released'         => $request->comic_released,
                'comic_alternative'      => $request->comic_alternative,
                'comic_sinopsis'         => $request->comic_sinopsis,
                'comic_slug'             => $generate_slug,
                'comic_cover'            => 'default.jpg',
                'comic_status'           => $request->comic_status,
                'comic_link_cover'       => $request->comic_link_cover,
                'status'                 => ($request->status ? 'Publish' : 'Unpublish'),
                'created_at'             => new \DateTime(),
                'updated_at'             => new \DateTime(),
            ]);

            if (!is_null($data)) {
                return  redirect()->route('manageKomik')
                    ->with('message_success', 'Berhasil menambahkan komik' . ' ' . $request->comic_title);
            }
        } else {
            return  $this->handleAddUploadImageKomik($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
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
    public function edit(Comic $comic)
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
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'comic_genre'   => 'required',
            'comic_artist' => 'required',
            'comic_author' => 'required',
            'comic_cover' => 'image|mimes:jpeg,png,jpg|max:2048',
            'comic_status' => 'required',
            'comic_link_cover' => 'required|url'
        ]);

        if ($request->comic_title != $comic->comic_title) {
            $request->validate(['comic_title' => 'required|min:6|max:120|unique:comics,comic_title']);
        }

        if (!$request->comic_cover) {
            $generate_slug = Str::slug($request->comic_title, '-');
            $generate_slug .= '.html';

            $data = Comic::where('comic_slug', $comic->comic_slug)->update([
                'comic_title'            => $request->comic_title,
                'comic_genre'            => json_encode($request->comic_genre),
                'comic_author'           => $request->comic_author,
                'comic_artist'           => $request->comic_artist,
                'comic_rating'           => $request->comic_rating,
                'comic_released'         => $request->comic_released,
                'comic_alternative'      => $request->comic_alternative,
                'comic_sinopsis'         => $request->comic_sinopsis,
                'comic_slug'             => $generate_slug,
                'comic_cover'            => 'default.jpg',
                'comic_status'           => $request->comic_status,
                'comic_link_cover'       => $request->comic_link_cover,
                'status'                 => ($request->status ? 'Publish' : 'Unpublish'),
                'updated_at'             => new \DateTime(),
            ]);

            if (!is_null($data)) {
                return  redirect()->route('manageKomik')
                    ->with('message_success', 'Berhasil memperbarui komik' . ' ' . $comic->comic_title);
            }
        } else {
            return $this->handleUpdateUploadImageKomik($request, $comic);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
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

    private function handleAddUploadImageKomik(Request $request)
    {
        $extension = $request->comic_cover->extension();
        $cover_name = md5(uniqid(rand(), true)) . '.' . $extension;
        $path  = $request->comic_cover->move('images/komik/', $cover_name);
        // (is_null($path) ?  $path : $path = []);
        $generate_slug = Str::slug($request->comic_title, '-');
        $generate_slug .= '.html';

        $data = Comic::create([
            'comic_title'            => $request->comic_title,
            'comic_genre'            => json_encode($request->comic_genre),
            'comic_author'           => $request->comic_author,
            'comic_artist'           => $request->comic_artist,
            'comic_rating'           => $request->comic_rating,
            'comic_released'         => $request->comic_released,
            'comic_alternative'      => $request->comic_alternative,
            'comic_sinopsis'         => $request->comic_sinopsis,
            'comic_slug'             => $generate_slug,
            'comic_cover'            => (is_null($cover_name) ? 'default.jpg' : $cover_name),
            'comic_status'           => $request->comic_status,
            'comic_link_cover'       => $request->comic_link_cover,
            'status'                 => ($request->status ? 'Publish' : 'Unpublish'),
            'created_at'             => new \DateTime(),
            'updated_at'             => new \DateTime(),
        ]);

        if (!is_null($data)) {
            return  redirect()->route('manageKomik')
                ->with('message_success', 'Berhasil menambahkan komik' . ' ' . $request->comic_title);
        }
    }

    private function handleUpdateUploadImageKomik(Request $request, Comic $comic)
    {
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

        $data = Comic::where('comic_slug', $comic->comic_slug)->update([
            'comic_title'            => $request->comic_title,
            'comic_genre'            => json_encode($request->comic_genre),
            'comic_author'           => $request->comic_author,
            'comic_artist'           => $request->comic_artist,
            'comic_rating'           => $request->comic_rating,
            'comic_released'         => $request->comic_released,
            'comic_alternative'      => $request->comic_alternative,
            'comic_sinopsis'         => $request->comic_sinopsis,
            'comic_slug'             => $generate_slug,
            'comic_cover'            => (is_null($cover_name) ? 'default.jpg' : $cover_name),
            'comic_status'           => $request->comic_status,
            'comic_link_cover'       => $request->comic_link_cover,
            'status'                 => ($request->status ? 'Publish' : 'Unpublish'),
            'updated_at'             => new \DateTime(),
        ]);

        if (!is_null($data)) {
            return  redirect()->route('manageKomik')
                ->with('message_success', 'Berhasil memperbarui komik' . ' ' . $comic->comic_title);
        }
    }


    public function volume()
    {
        $comics = Comic::orderBy('comic_title', 'ASC')->latest()->get();
        return view('pages.admin.komik.volume.index', [
            'comics' => $comics,
        ]);
    }

    public function show_volume(Comic $comic)
    {
        $comics = Comic::where('comic_slug', $comic->comic_slug)->first();
        $volumes = ComicVolume::where('comic_id', $comic->id)->get();

        return view('pages.admin.komik.volume.show', [
            'comic' => $comics,
            'volumes' => $volumes,
        ]);
    }

    public function edit_volume(Comic $comic)
    {
        $comics = Comic::where('comic_slug', $comic->comic_slug)->first();
        $volumes = ComicVolume::where('comic_id', $comic->id)->paginate(5);

        return view('pages.admin.komik.volume.show', [
            'comic' => $comics,
            'volumes' => $volumes,
        ]);
    }


    public function insert_volumes(Request $request, Comic $comic)
    {
        $request->validate([
            'volume_name' => 'required|unique:comic_volumes,volume_name',
            'volume_link' => 'required|url'
        ]);

        ComicVolume::create([
            'comic_id'    => $comic->id,
            'volume_name' => $request->volume_name,
            'volume_link' => $request->volume_link,
            'created_at'  => new \DateTime(),
            'updated_at'  => new \DateTime(),
        ]);

        return redirect()->route('manageVolumeShow', $comic->comic_slug)
            ->with('message_success', 'Successfully added' . ' ' . $request->volume_name);
    }

    public function delete_volumes($id, Comic $comic)
    {
        $volumes = ComicVolume::where('id', $id)->first();
        $volumes->delete();

        return redirect()->route('manageKomikShow', $comic->comic_slug);
    }

    public function genres()
    {
        $genres = ComicGenre::orderBy('genre_name', 'ASC')->get();

        return view('pages.admin.komik.genre.index', compact(['genres']));
    }

    public function genres_add(Request $request)
    {
        $request->validate([
            'genre_name' => 'required|unique:comic_genres,genre_name',
        ]);

        $generate_slug = Str::slug($request->genre_name, '-');
        ComicGenre::create([
            'genre_name' => $request->genre_name,
            'genre_slug' => $generate_slug,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        return redirect()->route('manageGenreIndex')
            ->with('message_success', 'Berhasil menambahkan genre' . ' ' . $request->genre_name);
    }

    public function genres_deleted($id)
    {
        $genres = ComicGenre::where('id', $id)->first();

        if ($genres->id == $id) {
            $genres->delete();

            return redirect()->route('manageGenreIndex')
                ->with('message_success', 'Berhasil menghapus genre' . ' ' . $genres->genre_name);
        } else {
            return $genres = [];
        }
    }
}
