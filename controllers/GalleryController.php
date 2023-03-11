<?php

namespace UrsacoreLab\Gallery\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use UrsacoreLab\Gallery\Models\Gallery;
use UrsacoreLab\Gallery\Resources\GalleryResource;
use UrsacoreLab\StaticVars\Classes\Additional;
use UrsacoreLab\StaticVars\Classes\Statuses;

class GalleryController extends Controller
{
    protected bool $debug = false;

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        $this->debug = config('app.debug');

        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Gallery', 'gallery', 'GalleryController');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }

    public function list(): AnonymousResourceCollection
    {
        $data = Gallery::query()
            ->where('status', Statuses::ACTIVE)
            ->orderBy('created_at')
            ->get();

        return GalleryResource::collection($data)
            ->additional(
                $data->isEmpty()
                    ?
                    Additional::warning($this->debug)
                    :
                    Additional::success($this->debug, null, 'statuses.synced')
            );
    }

    public function single($slug): GalleryResource|array
    {
        $data = Gallery::query()
            ->where('slug', $slug)
            ->where('status', Statuses::ACTIVE)
            ->first();

        if (isset($data)) {
            return GalleryResource::make($data)
                ->additional(Additional::success($this->debug, null, 'statuses.synced'));
        }

        return Additional::error($this->debug);
    }
}
