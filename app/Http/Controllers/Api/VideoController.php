<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoResource::collection(Video::paginate(60)->sortByDesc('id'));
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
    
    public function getVideosFrontPage()
    {
        // return Video::paginate(
        //     $perPage = 60,
        //     $columns = ['id','title','imageUrl','views','likes'],
        //     $options = true,
        // );
        return Video::paginate(request()->all);
    }
}
