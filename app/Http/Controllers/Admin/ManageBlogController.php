<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManageBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();

        return view('pages.admin.blog.index', compact(['blog']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.blog.add', compact([]));
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
            'blog_name' => 'required|min:6|unique:blogs,blog_name',
            'blog_desc' => 'required',
            'blog_cover' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->blog_cover) {
            $extension = $request->blog_cover->extension();
            $generete_cover_name = Str::slug($request->blog_name, '-');
            $cover_name = $generete_cover_name . '.' . $extension;
            $path  = $request->blog_cover->move('images/blog/', $cover_name);

            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';


            Blog::create([
                'user_id'       => (!Auth::user()->role_id ? 'Administrator' : Auth::user()->role_id),
                'blog_name'     => $request->blog_name,
                'blog_slug'     => $generate_slug,
                'blog_desc'     => $request->blog_desc,
                'status'        => $request->status,
                'blog_cover'    => $cover_name,
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),
            ]);

            return redirect()->route('manageBlogIndex')
                ->with('message_success', 'Berhasil menambahkan postingan' . ' ' . $request->blog_name);
        } else {
            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';

            Blog::create([
                'user_id'       => Auth::user()->role_id,
                'blog_name'     => $request->blog_name,
                'blog_slug'     => $generate_slug,
                'blog_desc'     => $request->blog_desc,
                'status'        => $request->status,
                'blog_cover'    => 'default.jpg',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),
            ]);

            return redirect()->route('manageBlogIndex')
                ->with('message_success', 'Berhasil menambahkan postingan' . ' ' . $request->blog_name);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::where("blog_slug", $blog->blog_slug)->first();

        return view('pages.admin.blog.edit', compact(['blog']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            // 'blog_name' => 'required|min:6|unique:blogs,blog_name',
            'blog_desc' => 'required',
            'blog_cover' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $setRulesBlogName = $request->validate(['blog_name' => 'required|min:6|unique:blogs,blog_name']);
        ($request->blog_name != $blog->blog_name ? $setRulesBlogName : '');

        if ($request->blog_cover) {
            // Cek file cover lama
            $cover_old = public_path('images/blog/' . $blog->blog_cover);
            (File::exists($cover_old) ? File::delete($cover_old) : '');

            // Generate FILE COVER
            $extension = $request->blog_cover->extension();
            $generete_cover_name = Str::slug($request->blog_name, '-');
            $cover_name = $generete_cover_name . '.' . $extension;
            $path  = $request->blog_cover->move('images/blog/', $cover_name);

            // Generate URL
            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';

            Blog::where('blog_slug', $blog->blog_slug)->update([
                'user_id'       => (!Auth::user()->role_id ? '1' : Auth::user()->role_id),
                'blog_name'     => $request->blog_name,
                'blog_slug'     => $generate_slug,
                'blog_desc'     => $request->blog_desc,
                'status'        => $request->status,
                'blog_cover'    => $cover_name,
                'updated_at'    => new \DateTime(),
            ]);

            return redirect()->route('manageBlogIndex')
                ->with('message_success', 'Berhasil memperbarui postingan' . ' ' . $blog->blog_name);
        } else {
            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';

            Blog::where('blog_slug', $blog->blog_slug)->update([
                'user_id'       => (!Auth::user()->role_id ? '1' : Auth::user()->role_id),
                'blog_name'     => $request->blog_name,
                'blog_slug'     => $generate_slug,
                'blog_desc'     => $request->blog_desc,
                'status'        => $request->status,
                'blog_cover'    => 'default.jpg',
                'updated_at'    => new \DateTime(),
            ]);

            return redirect()->route('manageBlogIndex')
                ->with('message_success', 'Berhasil menambahkan postingan' . ' ' . $request->blog_name);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->where('blog_slug', $blog->blog_slug)->first();

        $cover_old = public_path('images/blog/' . $blog->blog_cover);
        (File::exists($cover_old) ? File::delete($cover_old) : '');

        $blog->delete();
        return redirect()->route('manageBlogIndex')
            ->with('message_success', 'Berhasil menghapus postingan' . ' ' . $blog->blog_name);
    }
}
