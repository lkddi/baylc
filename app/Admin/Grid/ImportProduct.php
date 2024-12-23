<?php

namespace App\Admin\Grid;

use App\Admin\Forms\ZtProductImport;
use App\Admin\Forms\ZtStoreImport;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Tools\AbstractTool;

class ImportProduct extends AbstractTool
{
    /**
     * @return string
     */
    protected $title = 'Title';
    public function render()
    {
        $id = "reset-pwd-{$this->getKey()}";

        // 模态窗
        $this->modal($id);

        return <<<HTML
<span class="grid-expand" data-toggle="modal" data-target="#{$id}">
   <a href="javascript:void(0)"><button class="btn btn-outline-info ">上传Excel增加修改型号</button></a>


</span>
HTML;
    }
    protected function modal($id)
    {
        $form = new ZtProductImport();

        Admin::script('Dcat.onPjaxComplete(function () {
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open");
        }, true)');

        // 通过 Admin::html 方法设置模态窗HTML
        Admin::html(
            <<<HTML
<div class="modal fade" id="{$id}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">导入数据</h4>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
              {$form->render()}

<h4 class="modal-content">导入数据示例 点击下载: <a href="/批量添加型号.xlsx" target="_blank">批量添加产品</a></h4>
      </div>
    </div>

  </div>
</div>
HTML
        );
    }



    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
