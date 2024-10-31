<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\Category\CreateRequest;
use App\Http\Requests\Web\Category\UpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getList();

        return view('categories.list', ['items'=> $categories]);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $request = $request->validated();
        $result = $this->categoryService->update($category, $request);
        
        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Updated success');
        }

        return redirect()->route('categories.index')->with('error', 'Updated fail');
    }

    public function show(Category $category)
    {
        return view('categories.show', ['category'=> $category]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(CreateRequest $request){
        $request = $request->validated();
        $result = $this->categoryService->store($request);

        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Create new category successfully');
        }
        return redirect()->route('categories.create')->with('error', 'Create category fail');
    }

    public function destroy(Category $category){
        $result = $this->categoryService->destroy($category);
        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Delete category successfully');
        }
        return redirect()->route('categories.index')->with('error', 'Delete category fail');
    }
}
