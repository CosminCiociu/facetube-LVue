<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Http\Requests\VideoRequest;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\JsonResponse;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('date')){
            switch ($request -> input('date')) {
                case "today":
                    $video = Video::whereDate('created_at', '>' , date("Y-m-d", strtotime("-1 days")))->orderBy('id', 'DESC');
                    break;

                case "week":
                    $video = Video::whereDate('created_at', '>' , date("Y-m-d", strtotime("-1 weeks")))->orderBy('id', 'DESC');
                    break;

                case "mounth":
                    $video = Video::whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 mounths")))->orderBy('id', 'DESC');

                    break;
                case "alltime":
                    $video = Video::paginate(
                        $perPage = 60,
                        $columns = ['id','title','imageUrl','duration','likes', 'folderName']);
                    return $this->filterImages($video);
                    break;
            }
        } else {
            $video = Video::whereDate('created_at', '>' , date("Y-m-d", strtotime("-1 mounths")))->orderBy('id', 'DESC')->paginate(
                $perPage = 60,
                $columns = ['id','title','imageUrl','duration','likes', 'folderName'],
            );
            return $this->filterImages($video);
        }
            $video = $video->paginate(
                $perPage = 60,
                $columns = ['id','title','imageUrl','duration','likes', 'folderName'],
            );
            return $this->filterImages($video);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $video = Video::where('videoUrl', '=' ,$request->input('videoUrl'))->exists();
        if($video) {
            return new JsonResponse('Already in db',JsonResponse::HTTP_ALREADY_REPORTED);
        }
        $categoriesNamesArray = $request->input('categories');
        unset($request['categories']);

        $video = Video::create($request->all());

        if($categoriesNamesArray && is_array($categoriesNamesArray)){
            foreach($categoriesNamesArray as $categoryName) {
                $category = Category::whereTitle($categoryName)->first();
                if($category) {
                    $video->categories()->attach($category->id);
                }
            }
        }
        return new JsonResponse('Stored',JsonResponse::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return new VideoResource($video);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request,Video $video)
    {
        $video->update($request->validated());

        return new VideoResource($video);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return response()->noContent();

    }

    public function getVideosBySearch(Request $request)
    {
        $data = Video::where('title', 'LIKE','%'.$request->keyword.'%')->select('id','title')->limit(3)->get();
        return response()->json($data); 
    }

    public function getVideosForSearchPage(Request $request)
    {
        $videos = Video::where('title', 'LIKE','%'.$request->keyword.'%')->take(10)->get();
        $categories = Category::where('title', 'LIKE','%'.$request->keyword.'%')->take(20)->get();
        return response()->json(['videos' => $videos,'categories' => $categories]); 
    }

    public function getRelatedVideosByCategory(Request $request)
    {
        if($request->categoryId){
            $categoryId = $request->categoryId;
            $videos = Video::whereHas('categories', function ($query) use($categoryId) {
                $query->where('category_id', $categoryId);
            })->inRandomOrder()->limit(12)->get();
        }
        return $this->filterImages($videos);
    }

    private function filterImages($videos) {
        foreach($videos as $video) {
            if(!filter_var($video['imageUrl'], FILTER_VALIDATE_URL)) {
               $video['imageUrl'] = URL::asset('storage/images-videos/') . '/' .$video->folderName . '/' . $video->imageUrl . '.jpg';
            }
        }
        return $videos ;
    }
}
