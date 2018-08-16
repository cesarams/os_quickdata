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
        $this->name = 'os_quickdata';
        $this->version = '0.1';
        $this->author = 'Oscar Sanchez';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Quick Data', array(), 'Modules.Quickdata.Admin');
        $this->description = $this->trans('Visor y editor rápido de datos Prestashop.', array(), 'Modules.Quickdata.Admin');

        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);

    }


    /**
     * @return mixed
     */
    public function getContent(){
        $message = '';
        $errorData = false;

        if( ToolsCore::getValue('deleteCategories')){

            if($this->deleteCategories()){
                $message = $this->trans('Categorias eliminadas correctamente.', array(), 'Admin.Quickdata.Success');
            }else{
                $message = $this->trans('No se han podido eliminar las categorias', array(), 'Modules.Quickdata.Error');
                $errorData = true;
            }

        }
        $categories = $this->filterCategoryForTemplate(Category::getCategories($this->context->language->id,false ));

        $this->context->smarty->assign(
            array(
               'categories' =>  $categories,
                'link' =>$this->context->link,
                'message' => $message,
                'errorData' =>$errorData
            )
        );
     
        return $this->display(__FILE__, '/views/templates/admin/admin.tpl');

    }

    /**
     * @param $categories
     * @return array
     */
    public function filterCategoryForTemplate(array $categories){

        $categoriesFilter = [];
        $firsValue = true;

        foreach($categories as $categorysArray){
            if($firsValue){
                $firsValue = false;
                continue;
            }
            foreach($categorysArray as $category){
                $categoriesFilter[] =  array_values($category)[0];
            }
        }

        return $categoriesFilter;
    }


    /**
     * @return bool
     */
    public function deleteCategories(){

        $complete = false;
        foreach($_POST as $name => $value){

            if(!CategoryCore::categoryExists($value))
                continue;

            $category = new Category($value);
           if($category->delete())
               $complete = true;
        }

        return $complete;
    }

}