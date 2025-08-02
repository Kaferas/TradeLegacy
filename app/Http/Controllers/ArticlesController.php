<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;
use App\Models\Categories;
use App\Models\Post_pictures;
use App\Models\Tag_post;
use App\Models\Tags;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->emptyCacheImage();
        $posts = Articles::where("deleted_status", 0)->with("user")->with("tags")->with("categories")->with("pictures")->orderBy('id', "DESC")->get();
        $categories = Categories::where('deleted_status', 0)->orderBy("id","DESC")->get();
        return view("admin.posts.index", ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->emptyCacheImage();
        $categories = Categories::where('deleted_status', 0)->get();
        $tags = Tags::where('deleted_status', 0)->get();
        return view("admin.posts.add", ['categories' => $categories, 'tags' => $tags]);
    }


    private function emptyCacheImage(){
        TemporaryImage::truncate();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticlesRequest $request)
    {
        $post = new Articles();
        $temporaries_images =TemporaryImage::all();
        if ($request->file('pictures_path')) {
            $files = $request->file('pictures_path');
            $fileName = time() . '_' . $files->getClientOriginalName();
            $request->file('pictures_path')->storeAs('uploads/posts', $fileName, 'public');

            $created = $post->create([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'author' => 1,
                'categorie_id' => $request->get('categorie_id'),
                'pictures_path' => $fileName,
                'is_published' => $request->get('is_published') ?? "off",
            ]);
            $posts_ = [];
            $tags_post = [];
            if (!empty($request->pictures)) {
                foreach ($temporaries_images as $picture) {
                    // $fileN = time() . '_' . $picture->getClientOriginalName();
                    // $picture->storeAs("uploads/posts/post_pictures", $fileN, "public");
                    Storage::copy("images/tmp".$picture->folder."/".$picture->file, "public/uploads/posts/post_pictures/".$picture->folder."/".$picture->file);
                array_push($posts_, [
                        'post_id' => $created->id,
                        'name' => $picture->file,
                        'pictures_path' => $picture->folder."/".$picture->file,
                        'created_at' => date('y-m-d h:m:i')
                    ]);
                    Storage::deleteDirectory('images/tmp'.$picture->folder);
                }
                Post_pictures::insert($posts_);
                TemporaryImage::truncate();
            }
            if(!empty($request->input('tags_id'))){
                foreach ($request->get('tags_id') as $tag) {
                    array_push($tags_post, [
                        'tags' => $tag,
                        'post_id' => $created->id,
                        'created_at' => date('y-m-d h:m:i')
                    ]);
                }
                Tag_post::insert($tags_post);
            }
        }
        return redirect("/post_blog")
            ->with('success', 'Le Post ajoute avec Success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $post)
    {
        $tags_id = $post->tags->map(function ($tag) {
            return $tag->id;
        })->toArray();
        $categories = Categories::where('deleted_status', 0)->get();
        $tags = Tags::where('deleted_status', 0)->get();
        return view("admin.posts.edit", ['post' => $post, 'tags_id' => $tags_id, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticlesRequest $request, Articles $post)
    {
        $posts_ = [];
        $tags_post = [];
        if ($request->file('pictures_path')) {
            $files = $request->file('pictures_path');
            $fileName = time() . '_' . $files->getClientOriginalName();
            $request->file('pictures_path')->storeAs('uploads/posts', $fileName, 'public');
        } else {
            $fileName = $post->pictures_path;
        }
        $post->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'author' => 1,
            'categorie_id' => $request->get('categorie_id'),
            'pictures_path' => $fileName,
            'is_published' => $request->get('is_published') ?? "off",
        ]);

        if ($request->file('pictures')) {
            foreach ($request->file('pictures') as $picture) {
                $fileN = time() . '_' . $picture->getClientOriginalName();
                $picture->storeAs("uploads/posts/post_pictures", $fileN, "public");
                array_push($posts_, [
                    'pictures_path' => $fileN,
                    'post_id' => $post->id,
                    'updated_at' => date('y-m-d h:m:i')
                ]);
            }
        } else {
            foreach ($post->pictures as $picture) {
                array_push($posts_, [
                    'post_id' => $post->id,
                    'pictures_path' => $post->pictures->first()->pictures_path,
                    'updated_at' => date('y-m-d h:m:i')
                ]);
            }
        }
        Post_pictures::upsert($posts_, ['post_id'], ['pictures_path', 'updated_at']);

        if (!empty($request->tags_id)) {
            foreach ($request->get('tags_id') as $tag) {
                array_push($tags_post, [
                    'tags' => $tag,
                    'post_id' => $post->id,
                    'updated_at' => date('y-m-d h:m:i')
                ]);
            }
        } else {
            foreach ($post->tags as $tag) {
                array_push($tags_post, [
                    'post_id' => $post->id,
                    'tags' => $tag->id,
                    'updated_at' => date('y-m-d h:m:i')
                ]);
            }
        }
        Tag_post::insert($tags_post, ['post_id'], ['tags', 'updated_at']);
        return redirect("/post_blog")
            ->with('update', 'Le Post Modifie avec Success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $post)
    {
        $is = $post->update(['deleted_status' => 1]);
        if ($is) {
            return redirect("/posts")->with("delete", "Posts Supprime avec Success");
        }
    }
}
