<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Psy\Exception\FatalErrorException;

class BlogsController extends Controller
{

    /**
     * Create a new BlogsController instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'delete']]);
    }

    public function index()
    {
        $blogs = Blog::latest('published_at')->published()->get();
        $latest = Blog::latest()->first();
        return view('blog.index', compact('blogs', 'latest'));
    }

    public function show(Blog $blog)
    {
        $path = null;
        $extensions = ['bmp', 'gif', 'jpg', 'png'];
        foreach($extensions as $ext)
        {
            $potentialPath = 'images/catalog/' . $blog->id . '.' . $ext;
            if (file_exists($potentialPath)) {
                $path = $potentialPath;
            }
        }
        return view('blog.show', compact('blog', 'path'));
    }

    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('blog.create', compact('tags'));
    }

    public function update(Blog $blog, BlogRequest $request)
    {
        $blog->update([
            'id' => $request->get('id'),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'published_at' => $request->get('published_at'),
        ]);

        $this->saveImage($blog, $request);

        $tags = $request->input('tag_list');
        if ($tags) $this->syncTags($blog, $tags);

        if ($blog->published_at > Carbon::now()) return redirect("blog");
        return redirect("blog/$blog->id");
    }

    /**
     * Save a new article.
     *
     * @param BlogRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BlogRequest $request)
    {
        $this->createArticle($request);
        return redirect('blog')->with([
            'flash_message' => 'Your article has been created'
        ]);
    }

    public function edit(Blog $blog)
    {
        $tags = Tag::lists('name', 'id');
        return view('blog.edit')->with(compact('blog', 'tags'));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('blog')->with([
           'flash_message' => 'Your article has been deleted'
        ]);
    }

    public function search()
    {
        if (Input::has('query')) {
            $query = Input::get('query');

            $blogs = Blog::whereRaw("MATCH (title, body) AGAINST
            (? IN BOOLEAN MODE)", array($query))
                ->orderBy('published_at', 'DESC')
                ->published()
                ->get();

            if (!$blogs->isEmpty()) {
                return view('blog.index', ['blogs' => $blogs]);
            }
            else {
                return redirect('blog')->with(['blogs' => $blogs,
                    'flash_message' => 'No blogs were found
                    that match "' . $query . '".',
                    'flash_message_error' => true]);
            }
        }
        return redirect()->back();
    }

    /**
     * Sync up the list of tags in the database.
     *
     * @param Blog $blog
     * @param array $tags
     */
    private function syncTags(Blog $blog, array $tags)
    {
        $blog->tags()->sync($tags);
    }

    /**
     * @param BlogRequest $request
     * @return \App\Blog
     */
    private function createArticle(BlogRequest $request)
    {
        //$blog = Auth::user()->blogs()->create($request->all());
        $blog = new Blog([
           'id' => $request->get('id'),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'published_at' => $request->get('published_at'),
        ]);
        Auth::user()->blogs()->save($blog);

        $this->saveImage($blog, $request);

        $tags = $request->input('tag_list');
        if ($tags) $this->syncTags($blog, $tags);
        return $blog;
    }

    private function saveImage(Blog $blog, BlogRequest $request)
    {
        if ($request->file('image')) {
            $imageName = $blog->id . '.' . $request->file('image')->getClientOriginalExtension();
            $newExt = 'images/catalog/'. $imageName;
            $img = Image::make($request->file('image'))->orientate()->heighten(300);
            $img->save(public_path($newExt));
        }
    }
}
