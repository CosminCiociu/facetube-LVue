<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Video;
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
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        if($request->input('date')){
            switch ($request -> input('date')) {
                case "today":
                    $videos = Video::where('category_id','=',$category->id)->whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 days")));
                    break;

                case "week":
                    $videos = Video::where('category_id','=',$category->id)->whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 weeks")));
                    break;

                case "mounth":
                    $videos = Video::where('category_id','=',$category->id)->whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 mounths")));
                    break;
                case "alltime":
                    return Video::where('category_id','=',$category->id)->paginate(
                        $perPage = 60,
                        $columns = ['id','title','imageUrl','duration','likes'],
                    );
            }

            return $videos->paginate(
                $perPage = 60,
                $columns = ['id','title','imageUrl','duration','likes'],
            );
        }
    }   

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
