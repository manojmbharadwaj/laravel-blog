<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interceptors\PostInterceptor;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostInterceptor $interceptor)
    {
        $dto = $interceptor->prepareGetUserPostDto();
        $data['posts'] = $this->postService->listAuthorPosts($dto);
        // dd($data);
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('archive', false)
            ->select('id', 'name', 'slug')
            ->orderBy('name')
            ->get();
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostInterceptor $interceptor)
    {
        $dto = $interceptor->prepareStorePostDto();
        $res = $this->postService->createNewPost($dto);

        if (!empty($dto->getErrors())) {
            return back()->withInput()->with('msg', $dto->listErrors($dto))->with('type', 'warning');
        }

        return redirect()->route('post.index')->with('msg', $dto->listMessages($dto))->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
