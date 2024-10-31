<?php
namespace App\Services;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getList() {
        return $this->category->orderBy('id','desc')->get();
    }

    public function update($category, $data)
    {
        try {
            return $category->update($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }

    
    public function store($data)
    {
        try {
            return $this->category->create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function destroy(Category $category){
        try {
            return $category->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
