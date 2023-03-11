<?php

namespace UrsacoreLab\Gallery\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    public function toArray($request): array
    {
        if ($request->has('categories')) {
            return $this->withCategories();
        }

        return $this->baseArray();
    }

    protected function baseArray(): array
    {
        return [
            //'id'       => $this->id,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description,
            'images'      => GalleryImageResource::collection($this->images()->get()),
            //'status'      => $this->status,
        ];
    }

    protected function withCategories(): array
    {
        $data = [
            'categories' => GalleryCategoryResource::collection($this->categories()->get()),
        ];

        return array_merge($this->baseArray(), $data);
    }
}
