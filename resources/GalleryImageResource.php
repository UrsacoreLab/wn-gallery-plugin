<?php

namespace UrsacoreLab\Gallery\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryImageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            //'file_size' => $this->file_size,
            'extension' => $this->extension,
            "path"      => $this->path,
        ];
    }
}
