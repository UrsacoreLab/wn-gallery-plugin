<?php

namespace UrsacoreLab\Gallery\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            //'id'       => $this->id,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description,
            'images'      => GalleryImageResource::collection($this->images()->get()),
            //'status'      => $this->status,
            'categories'  => GalleryCategoryResource::collection($this->categories()->get()),
        ];
    }
}
