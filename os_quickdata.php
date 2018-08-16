<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 16/08/18
 * Time: 19:33
 */

class Os_QuickData extends Module
{
    public function __construct()
    {
        $this->name = 'os_quickview';
        $this->version = '0.1';
        $this->author = 'Oscar';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Quick Data', array(), 'Modules.Quickdata.Admin');
        $this->description = $this->trans('Visor y editor rápido de datos Prestashop.', array(), 'Modules.Banner.Admin');

        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);

    }

}