<?php

namespace App\Http\Controllers\Author;

use App\Models\Blog;
use App\Models\Comic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $total_komik = Comic::count();
        $total_artikel = Blog::where('user_id', $id)->count();
        $total_blog_publish = Blog::where('user_id', $id)->where('status', 'Publish')->count();
        $total_blog_unpublish = Blog::where('user_id', $id)->where('status', 'Unpublish')->count();

        return view('pages.author.dashboard.index', compact(['total_komik', 'total_artikel', 'total_blog_unpublish', 'total_blog_publish']));
    }

    public function blog_index()
    {
        $id = Auth::user()->id;
        $blog = Blog::where('user_id', $id)->get();

        return view('pages.author.blog.index', compact(['blog']));
    }

    public function blog_add()
    {
        return view('pages.author.blog.add',);
    }

    public function blog_store(Request $request)
    {
        $id = Auth::user()->id;
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
                'user_id'       => $id,
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

            return redirect()->route('authorBlog')
                ->with('message_success', 'Berhasil menambahkan postingan' . ' ' . $request->blog_name);
        } else {
            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';
            Blog::create([
                'user_id'       => $id,
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

            return redirect()->route('authorBlog')
                ->with('message_success', 'Berhasil menambahkan postingan' . ' ' . $request->blog_name);
        }
    }

    public function blog_show(Blog $blog)
    {
        $id = Auth::user()->id;
        // $blog = Blog::where('user_id', Auth::user()->role_id)->get();
        // $blogs = $blog->where('blog_slug', $blog->blog_slug)->first();
        $blogs = $blog->where('user_id', $id)
            ->orWhere('blog_slug', $blog->blog_slug)->first();

        return view('pages.author.blog.show', compact(['blogs']));
    }

    public function blog_edit(Blog $blog)
    {
        $id = Auth::user()->id;
        $blogs = $blog->where('user_id', $id)
            ->orWhere('blog_slug', $blog->blog_slug)->first();

        return view('pages.author.blog.edit', compact(['blog']));
    }

    public function blog_update(Request $request, Blog $blog)
    {
        $id = Auth::user()->id;
        $request->validate([
            // 'blog_name' => 'required|min:6|unique:blogs,blog_name',
            'blog_desc' => 'required',
            'blog_cover' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->blog_name != $blog->blog_name) {
            $request->validate(['blog_name' => 'required|min:6|unique:blogs,blog_name']);
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
                'user_id'       =>  $id,
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

            return redirect()->route('authorBlog')
                ->with('message_success', 'Berhasil memperbarui postingan' . ' ' . $blog->blog_name);
        } else {
            $generate_slug = Str::slug($request->blog_name, '-');
            $generate_slug .= '.html';

            Blog::where('blog_slug', $blog->blog_slug)->update([
                'user_id'       => $id,
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

            return redirect()->route('authorBlog')
                ->with('message_success', 'Berhasil memperbarui postingan' . ' ' . $blog->blog_name);
        }
    }

    public function blog_destroy(Blog $blog)
    {
        $id = Auth::user()->id;
        $blogs = $blog->where('user_id', $id)
            ->orWhere('blog_slug', $blog->blog_slug)->first();

        $cover_old = public_path('images/blog/' . $blogs->blog_cover);
        (File::exists($cover_old) ? File::delete($cover_old) : '');

        $blogs->delete();
        return redirect()->route('authorBlog')
            ->with('message_success', 'Berhasil menghapus postingan' . ' ' . $blogs->blog_name);
    }

    public function blog_publish()
    {
        $id = Auth::user()->id;
        $blog = Blog::where('user_id', $id)->get();

        return view('pages.author.blog.publish', compact(['blog']));
    }

    public function blog_publish_update($id)
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

        return redirect()->route('authorBlogPublish')
            ->with('message_success', 'Postingan ' . $blogs->blog_name . '' . ' di unpublish');
    }

    public function blog_draft()
    {
        $id = Auth::user()->id;
        $blog = Blog::where('user_id', $id)->get();

        return view('pages.author.blog.draft', compact(['blog']));
    }

    public function blog_draft_update($id)
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

        return redirect()->route('authorBlogDraft')
            ->with('message_success', 'Postingan ' . $blogs->blog_name . '' . ' di publish');
    }
}
