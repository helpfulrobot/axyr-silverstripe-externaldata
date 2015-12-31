<?php

class ExternalDataPage extends Page
{
}

class ExternalDataPage_Controller extends Page_Controller
{
    
    public static $dataModel = 'ExternalRestDataObject';
    
    private static $allowed_actions = array(
        'view',
        'delete',
        'DetailForm'
    );
    
    public function view($request)
    {
        return array();
    }
    
    public function delete($request)
    {
        if ($id = $this->request->param('ID')) {
            $model = self::$dataModel;
            $model::delete_by_id($id);
        }
        return $this->redirectBack();
    }
    
    public function ExternalDataList()
    {
        $model = self::$dataModel;
        return $model::get();
    }
    
    public function ExternalDataItem()
    {
        if ($id = $this->request->param('ID')) {
            $model = self::$dataModel;
            $record = $model::get_by_id($id);
            return $record;
        }
    }
    
    public function DetailForm()
    {
        $sng = singleton(self::$dataModel);
        
        $fields = $sng->getFrontEndFields();
        $fields->push(new HiddenField('ID', 'ID'));
        $actions = new FieldList(
            new FormAction('saveDetailForm', 'Save')
        );
        
        $form = new FoundationForm($this, __FUNCTION__, $fields, $actions);
        
        if ($record = $this->ExternalDataItem()) {
            $form->loadDataFrom($record);
        }
        
        return $form;
    }
    
    public function saveDetailForm($data, $form, $request)
    {
        $model = self::$dataModel;
        $obj = new $model($data);
        $form->saveInto($obj);
        $obj->write();
        
        return $this->redirect($this->Link('view').'/'.$obj->ID);
    }
}
