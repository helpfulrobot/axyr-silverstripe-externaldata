<?php

/**
 * RestDataObject
 *
 * This is an example DataObject to test ExternalRestDataObject
 *
 * @see ExternalRestDataObject, ExternalMySQLDataObject
 */
class RestDataObject extends DataObject
{
    
    public static $db = array(
        'Title'    => 'Varchar(255)',
        'Name'    => 'Varchar(255)',
        'Email'    => 'Varchar(255)'
    );
    
    private static $api_access = true;
    
    public function canView($member = null)
    {
        return true;
    }
    
    public function canCreate($member = null)
    {
        return true;
    }
    
    public function canEdit($member = null)
    {
        return true;
    }
    
    public function canDelete($member = null)
    {
        return true;
    }
}
