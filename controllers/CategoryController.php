<?php

namespace UrsacoreLab\Gallery\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use UrsacoreLab\Gallery\Models\Category;
use UrsacoreLab\Gallery\Models\GallerySettings;
use UrsacoreLab\Gallery\Resources\GalleryCategoryResource;
use UrsacoreLab\StaticVars\Classes\Additional;
use UrsacoreLab\StaticVars\Classes\Statuses;

class CategoryController extends Controller
{
    protected bool $additional_parameter_show_for_category_list = false;

    protected bool $additional_parameter_show_for_single_category = false;

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        $this->additional_parameter_show_for_category_list   = (boolean) GallerySettings::instance()->category_additional_parameter_show_for_list;
        $this->additional_parameter_show_for_single_category = (boolean) GallerySettings::instance()->category_additional_parameter_show_for_single;

        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Gallery', 'gallery', 'CategoryController');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }

    public function list(): AnonymousResourceCollection
    {
        $data = Category::query()
            ->where('status', Statuses::ACTIVE)
            ->orderBy('created_at')
            ->get();

        return GalleryCategoryResource::collection($data)
            ->additional(
                $data->isEmpty()
                    ?
                    Additional::warning($this->additional_parameter_show_for_category_list)
                    :
                    Additional::success($this->additional_parameter_show_for_category_list, null, 'statuses.synced')
            );
    }

    public function single($slug): GalleryCategoryResource|array
    {
        $data = Category::query()
            ->where('slug', $slug)
            ->where('status', Statuses::ACTIVE)
            ->first();

        if (isset($data)) {
            return GalleryCategoryResource::make($data)
                ->additional(Additional::success($this->additional_parameter_show_for_single_category, null, 'statuses.synced'));
        }

        return Additional::error($this->additional_parameter_show_for_single_category);
    }
}
