<?php 

namespace App\Services;

use App\Models\Template;
use App\Services\Core\BaseModelService;

class TemplateService extends BaseModelService
{
    public function model():string
    {
        return Template::class;
    }

    public function getActiveTemplateSlug()
    {
        $template = $this->model()::where('is_active', 1)->first();
        $templateSlug = $template->slug ?? 'classic';
        return ucfirst($templateSlug);
    }

    public function activate(Template $template)
    {
        $activeTemplate = $this->model()::where('is_active', true)->first();
        if ($activeTemplate) {
            $activeTemplate->is_active = false;
            $activeTemplate->save();
        }

        $template->update(['is_active' => true]);
        return $template;
    }
}