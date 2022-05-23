<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\CategoryVideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        return $this->filterImages($categories);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::where('title', 'LIKE' ,'%'.$request->title.'%')->exists();

        if($category) {
            return new JsonResponse('Already in db',JsonResponse::HTTP_ALREADY_REPORTED);
        }

        $category = Category::create($request->all());

        return new JsonResponse('Stored',JsonResponse::HTTP_OK);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        $categoryId = $category->id;
        if($request->input('date')){
            switch ($request -> input('date')) {
                case "today":
                    $videos = Video::whereHas('categories', function ($query) use($categoryId) {
                        $query->where('category_id', $categoryId);
                    })
                    ->whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 days")));
                    break;

                case "week":
                    $videos = Video::whereHas('categories', function ($query) use($categoryId) {
                        $query->where('category_id', $categoryId);
                    })
                    ->whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 weeks")));
                    break;

                case "mounth":
                    $videos = Video::whereHas('categories', function ($query) use($categoryId) {
                        $query->where('category_id', $categoryId);
                    })
                    ->whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 mounths")));
                    break;

                case "alltime":
                    return $this->filterImagesVideos(Video::whereHas('categories', function ($query) use($categoryId) {
                        $query->where('category_id', $categoryId);
                    })
                    ->paginate(
                        $perPage = 60,
                        $columns = ['id','title','imageUrl','duration','likes','folderName'],
                    ));
                    
            }
            return $this->filterImagesVideos(
                $videos->paginate(
                    $perPage = 60,
                    $columns = ['id','title','imageUrl','duration','likes','folderName'],
                )
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

    private function filterImages($categories) {
        foreach($categories as $category) {
            if(!filter_var($category['imageUrl'], FILTER_VALIDATE_URL)) {
               $category['imageUrl'] = URL::asset('storage/categories/') . '/' . $category->imageUrl . '.png';
            }
        }
        return $categories ;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function convertNameIntoId(Request $request)
    {
        if($request->input('categories') && is_array($request->input('categories'))){
            foreach($request->input('categories') as $categoryName) {
                $category = Category::whereTitle($categoryName)->first();
                if($category) {
                    $categoryIds[] = $category->id;
                }
            }
        }
        if(isset($categoryIds)){
            return $categoryIds;
        } else {
            return "";
        }
    }

    private function filterImagesVideos($videos) {
        foreach($videos as $video) {
            if(!filter_var($video['imageUrl'], FILTER_VALIDATE_URL)) {
               $video['imageUrl'] = URL::asset('storage/images-videos/') . '/' .$video->folderName . '/' . $video->imageUrl . '.jpg';
            }
        }
        return $videos ;
    }
}
