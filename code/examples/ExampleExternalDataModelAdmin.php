<?php

class ExampleExternalDataModelAdmin extends ExternalModelAdmin
{
    
    public static $url_segment    = 'externaldataadmin';
    public static $menu_title        = 'External Data';
    
    public static $managed_models    = array(
        'MongoDataObject',
        'ExternalRestDataObject',
        'ExternalMySQLDataObject'
    );
}
