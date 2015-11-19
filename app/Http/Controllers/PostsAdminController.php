<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostRequest;

use App\Post;

use App\Tag;

class PostsAdminController extends Controller
{
	private $post;


	public function __construct(Post $post) {
		$this->post = $post;
	}

    public function index() {
    	$dados = array(
    		'posts' => $this->post->paginate(10)
    	);
    	return view("admin/posts/index", $dados);
    }

    public function create() {
    	return view("admin/posts/create");
    }

    public function salvar(PostRequest $request) {
        
        $tags_ids = $this->tagIDs($request->tags);

    	$post = $this->post->create($request->all());
        $post->tags()->sync($tags_ids);

    	return redirect()->route('admin.posts.index');
    }

    public function editar($id) {
    	$dados = ['post'=>$this->post->find($id)];

    	return view("admin/posts/editar", $dados);
    }

    public function atualizar($id, PostRequest $request) {
        $tags_ids = $this->tagIDs($request->tags);

    	$this->post->find($id)->update($request->all());

        $post = $this->post->find($id);
        $post->tags()->sync($tags_ids);        

    	return redirect()->route('admin.posts.index');
    }

    public function apagar($id) {
    	$this->post->find($id)->delete();
    	return redirect()->route('admin.posts.index');
    }

    private function tagIDs($listaTags) {
        $tags = array_filter(array_map('trim', explode(",", $listaTags)));

        $tags_ids = [];

        foreach ($tags as $tag) {
            $tags_ids[] = Tag::firstOrCreate(['name' => $tag])->id;
        }
        return $tags_ids;
    }

}
