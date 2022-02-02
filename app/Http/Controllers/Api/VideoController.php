<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Http\Requests\VideoRequest;
use App\Models\Category;
use App\Models\Video;

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
                    $video = Video::whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 days")));
                    break;

                case "week":
                    $video = Video::whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 weeks")));
                    break;

                case "mounth":
                    $video = Video::whereDate('dateCreated', '>' , date("Y-m-d", strtotime("-1 mounths")));
                    break;
                case "alltime":
                    return Video::paginate(
                        $perPage = 60,
                        $columns = ['id','title','imageUrl','duration','likes'],
                    );
            }
        };
            return $video->paginate(
                $perPage = 60,
                $columns = ['id','title','imageUrl','duration','likes'],
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $video = Video::create($request->validated());

        return new VideoResource($video);

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
}
