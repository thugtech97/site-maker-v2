<?php

namespace App\Livewire\Site;

use App\Models\Site;
use Livewire\Component;

class ViewSite extends Component
{
    public $siteId;
    public $site;

    public function mount($siteId)
    {
        $this->siteId = $siteId;
        $this->site = Site::findOrFail($this->siteId);
    }

    public function render()
    {
        return view('livewire.site.view-site');
    }
}
