<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interceptors\CategoryInterceptor;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::where('archive', false)
            ->select('id', 'name', 'slug')
            ->get();
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryInterceptor $interceptor
     * @param PostService $post
     * @return void
     */
    public function store(CategoryInterceptor $interceptor, PostService $postService)
    {
        $dto = $interceptor->prepareStoreCategoryDto();
        $postService->createCategory($dto);

        if (!empty($dto->getErrors())) {
            return back()->withInput()->with('msg', $dto->listErrors($dto))->with('type', 'warning');
        }

        return redirect()->route('category.index')->with('msg', $dto->listMessages($dto))->with('type', 'success');
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
