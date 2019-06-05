<?php
define("CONFIG_WATSON_WORKSPACE_ID","799147ba-4450-447f-b8c6-8c452017934f");
define("CONFIG_WATSON_USERNAME","e20spartan@hotmail.com");
define("CONFIG_WATSON_PASSWORD","Abcd.1234");

if(empty($_ENV["VCAP_SERVICES"]))
{ 
   //local dev
   define("mysqlServer","localhost:3306"); 
   define("mysqlDB", "test2"); 
   define("mysqlUser","root"); 
   define("mysqlPass","");
   define("mysqlPort","3306");
} 
else 
{ 
    //running in Bluemix
    $vcap_services = json_decode($_ENV["VCAP_SERVICES" ]);
    if($vcap_services->{'mysql-5.5'}){ //if "mysql" db service is bound to this application
        $db = $vcap_services->{'mysql-5.5'}[0]->credentials;
    }
    else if($vcap_services->{'cleardb'}){ //if cleardb mysql db service is bound to this application
        $db = $vcap_services->{'cleardb'}[0]->credentials;
    } 
    else { 
        echo "Error: No pude conectar con Mysql. <br>";
        die();
    }
    
   define("mysqlServer", $db->hostname . ':' . $db->port); 
   define("mysqlDB", $db->name); 
   define("mysqlUser",$db->username); 
   define("mysqlPass",$db->password);
   define("mysqlPort","3306");
}
?>