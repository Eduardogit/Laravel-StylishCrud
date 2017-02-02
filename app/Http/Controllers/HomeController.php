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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct(postRepository $postRepo)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $this->postRepository->pushCriteria(new RequestCriteria($request));
        $posts = $this->postRepository->all();

        return view('home')
            ->with('posts', $posts);
    }
}
