<?php

if (!defined('_PS_VERSION_')) {
    return;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class outStockProduct extends Module implements WidgetInterface
{
    // const OUT_OF_STOCK_PRODUCT_MODULE = 'blockoutstockproduct';

    private $templateFile;

    public function __construct()
    {
        $this->name = 'outStockProduct';
        $this->author = 'Hoando';
        $this->version = '1.0';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Out Of Stock Product', [], 'Modules.outStockProduct.Admin');
        $this->description = $this->trans('Add a message when some product is out of stock.', [], 'Modules.outStockProduct.Admin');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $this->templateFile = 'module:outStockProduct/views/templates/hook/out_stock_product.tpl';
    }

    // public function install()
    // {
    //     if (Module::isInstalled(self::OUT_OF_STOCK_PRODUCT_MODULE)) {
    //         $oldModule = Module::getInstanceByName(self::OUT_OF_STOCK_PRODUCT_MODULE);
    //         if ($oldModule) {
    //             $oldModule->uninstall();
    //         }
    //     }

    //     return parent::install();
    // }

    // public function uninstall()
    // {
    //     return parent::uninstall();
    // }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->fetch($this->templateFile);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $product = $configuration['product'];
        return [
            'product' => $product
        ];
    }



}
