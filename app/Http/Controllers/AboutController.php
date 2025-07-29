<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sertif;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(3)->withQueryString();

        // Bersihkan semua tag HTML dari setiap post description
        $posts->getCollection()->transform(function ($post) {
            $post->description = strip_tags($post->description); // atau Str::limit(strip_tags(...)) jika ingin dibatasi
            return $post;
        });

        // Ambil data yang diperlukan untuk halaman About
        $data = [
            'posts' => $posts,
            'sertifs' => Sertif::latest()->get(),
            'personal' => config('profile'),
            'title' => 'About'
        ];
        return view('abouts.index', $data);
    }
    // Details Post
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('abouts.detailPost', [
            'post' => $post,
            'title' => 'Blog'
        ]);
    }
}
