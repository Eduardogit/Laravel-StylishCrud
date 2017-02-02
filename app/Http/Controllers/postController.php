<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Repositories\postRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;


class postController extends AppBaseController
{
    /** @var  postRepository */
    private $postRepository;

    public function __construct(postRepository $postRepo)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the post.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->postRepository->pushCriteria(new RequestCriteria($request));
        $posts = $this->postRepository->all();
        if(empty($posts)){
            Flash::error('No hay posts cargados actualmente');
        }

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param CreatepostRequest $request
     *
     * @return Response
     */
  
    public function store(Request  $request)
    {
        $input = $request->all();
        $titulo = $request->input('titulo');
        $titulo = str_replace(" ","",$titulo);

        $imageName = $request->file('imagen')->getClientOriginalExtension();
        if(!($imageName == 'jpg' || $imageName == 'png' || $imageName == 'JPEG')){
            Flash::error('Extension invalida');
              return view('posts.create');
        }
        $rand = str_random(15);
        $request->file('imagen')->move(base_path() . '/public/images/',$titulo.$rand.".".$imageName);
        //SET IMAGE NAME AS DEFAULT VALUE
        $input['imagen'] = $titulo.$rand.".".$imageName;

        //INSERT VIA REPO
        $post = $this->postRepository->create($input);

        Flash::success('Post saved successfully.');
        $this->postRepository->pushCriteria(new RequestCriteria($request));
        $posts = $this->postRepository->all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Display the specified post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('No se encontraron posts');
            return redirect(route('posts.index'));
        }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int              $id
     * @param UpdatepostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepostRequest $request)
    {
        $post = $this->postRepository->findWithoutFail($id);
        $this->postRepository->pushCriteria(new RequestCriteria($request));

        if (empty($post)) {
            Flash::error('Post not found');
            return redirect(route('posts.index'));
        }
        $titulo = $request->input('titulo');
        $titulo = str_replace(" ","",$titulo);
        if(empty($request->file('imagen'))){
            Flash::error('Extension invalida');
            return view('posts.edit');            
        }
        $imageName = $request->file('imagen')->getClientOriginalExtension();

         if(!($imageName == 'jpg' || $imageName == 'png' || $imageName == 'JPEG')){
            Flash::error('Extension invalida');
              return view('posts.edit');
        }
        $rand = str_random(15);
        $request->file('imagen')->move(base_path() . '/public/images/',$titulo.$rand.".".$imageName);
        //SET IMAGE NAME AS DEFAULT VALUE
         $input = $request->all();

        $input['imagen'] = $titulo.$rand.".".$imageName;



        $post = $this->postRepository->update($input, $id);

        Flash::success('Post updated successfully.');

        
        $posts = $this->postRepository->all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $this->postRepository->delete($id);

        Flash::success('Post deleted successfully.');

        return redirect(route('posts.index'));
    }
}
