<?php

namespace UrsacoreLab\Gallery\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        if ($request->get('gallery')) {
            return $this->withGalleries();
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
            //'status'   => $this->status,
        ];
    }

    protected function withGalleries(): array
    {
        $data = [
            'galleries' => GalleryResource::collection($this->galleries()->get()),
        ];

        return array_merge($this->baseArray(), $data);
    }
}
