<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
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
            'blog_name' => 'required|unique:blogs,blog_name',
            'blog_desc' => 'required',
            'blog_cover' => 'image|mimes:jpeg,png,jpg|max:2048',
            'blog_cover_link' => 'required|url',
        ]);

        if ($request->blog_cover) {
            $extension = $request->blog_cover->extension();
            $generete_cover_name = md5(uniqid(rand(), true));
            $cover_name = $generete_cover_name . '.' . $extension;
            $path  = $request->blog_cover->move('images/blog/', $cover_name);

            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';


            Blog::create([
                'user_id'       => (!Auth::user()->role_id ? 'Administrator' : Auth::user()->role_id),
                'blog_name'     => $request->blog_name,
                'blog_slug'     => $generate_slug,
                'blog_desc'     => $request->blog_desc,
                'blog_cover'    => $cover_name,
                'blog_cover_link' => $request->blog_cover_link,
                'status'        => $request->status,
                'publish_date'  => ($request->status == 'Publish' ? date('Y-m-d H:i:s') : null),
                'unpublish_date'  => ($request->status == 'Unpublish' ? date('Y-m-d H:i:s') : null),
                'publish_by'    => (Auth::user()->role_id ? Auth::user()->name : null),
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
                'blog_cover'    => 'default.jpg',
                'blog_cover_link' => $request->blog_cover_link,
                'status'        => $request->status,
                'publish_date'  => ($request->status == 'Publish' ? date('Y-m-d H:i:s') : null),
                'unpublish_date'  => ($request->status == 'Unpublish' ? date('Y-m-d H:i:s') : null),
                'publish_by'    => (Auth::user()->role_id ? Auth::user()->name : null),
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
        $blogs = $blog->where('blog_slug', $blog->blog_slug)->first();

        return view('pages.admin.blog.show', compact(['blogs']));
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

        if ($request->blog_name != $blog->blog_name) {
            $setRulesBlogName = $request->validate(['blog_name' => 'required|min:6|unique:blogs,blog_name']);
            return $setRulesBlogName;
        };

        if ($request->blog_cover) {
            // Cek file cover lama
            $cover_old = public_path('images/blog/' . $blog->blog_cover);
            (File::exists($cover_old) ? File::delete($cover_old) : '');

            // Generate FILE COVER
            $extension = $request->blog_cover->extension();
            $generete_cover_name = md5(uniqid(rand(), true));
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
                'blog_cover'    => $cover_name,
                'blog_cover_link' => $request->blog_cover_link,
                'status'        => $request->status,
                'publish_date'  => ($request->status == 'Publish' ? date('Y-m-d H:i:s') : null),
                'unpublish_date'  => ($request->status == 'Unpublish' ? date('Y-m-d H:i:s') : null),
                'publish_by'    => (Auth::user()->role_id ? Auth::user()->name : null),
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
                'blog_cover'    => 'default.jpg',
                'blog_cover_link' => $request->blog_cover_link,
                'status'        => $request->status,
                'publish_date'  => ($request->status == 'Publish' ? date('Y-m-d H:i:s') : null),
                'unpublish_date'  => ($request->status == 'Unpublish' ? date('Y-m-d H:i:s') : null),
                'publish_by'    => (Auth::user()->role_id ? Auth::user()->name : null),
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

    public function publish()
    {
        $blog = Blog::where('status', 'Publish')->orderBy('publish_date', 'DESC')->get();

        return view('pages.admin.blog.publish', compact(['blog']));
    }

    public function publish_update($id)
    {
        $blogs = Blog::find($id);
        $blogs->update([
            'user_id'              => $blogs->user_id,
            'blog_name'            => $blogs->blog_name,
            'blog_slug'            => $blogs->blog_slug,
            'blog_desc'            => $blogs->blog_desc,
            'blog_cover'           => $blogs->blog_cover,
            'blog_cover_link'      => $blogs->blog_cover_link,
            'status'               => 'Unpublish',
            'publish_date'         => null,
            'unpublish_date'       => new \DateTime(),
            'publish_by'           => $blogs->publish_by,
            'updated_at'           => new \DateTime(),
        ]);

        return redirect()->route('manageBlogPublish')
            ->with('message_success', 'Postingan ' . $blogs->blog_name . '' . ' di unpublish');
    }
    public function draft()
    {
        $blog = Blog::where('status', 'Unpublish')->orderBy('unpublish_date', 'DESC')->get();
        return view('pages.admin.blog.draft', compact(['blog']));
    }
    public function draft_update($id)
    {
        $blogs = Blog::find($id);
        $blogs->update([
            'user_id'              => $blogs->user_id,
            'blog_name'            => $blogs->blog_name,
            'blog_slug'            => $blogs->blog_slug,
            'blog_desc'            => $blogs->blog_desc,
            'blog_cover'           => $blogs->blog_cover,
            'blog_cover_link'      => $blogs->blog_cover_link,
            'status'               => 'Publish',
            'publish_date'         => new \DateTime(),
            'unpublish_date'       => null,
            'publish_by'           => $blogs->publish_by,
            'updated_at'           => new \DateTime(),
        ]);

        return redirect()->route('manageBlogDraft')
            ->with('message_success', 'Postingan ' . $blogs->blog_name . '' . ' di publish');
    }
}
