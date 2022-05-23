<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'imageUrl'      => $this->imageUrl,
            'folderName'    => $this->folderName,
            'videoUrl'      => $this->videoUrl,
            'views'         => $this->views,
            'duration'      => $this->duration,
            'likes'         => $this->likes,
            'category_id'   => $this->categories,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
