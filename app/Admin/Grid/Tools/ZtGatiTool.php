<?php

namespace App\Admin\Grid\Tools;

use Admin;
use App\Admin\Forms\Gatistarget;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Dcat\Admin\Widgets\Modal;

class ZtGatiTool extends AbstractTool
{

    public function render()
    {
        return Modal::make()
            ->lg()
            ->title('导入月度提成明细')
            ->body(Gatistarget::make())
            ->button('<button class="btn btn-primary grid-refresh btn-mini"><i class="feather icon-file-plus"></i><span class="d-none d-sm-inline">&nbsp; 导入提成加提</span></button>');
    }
}
