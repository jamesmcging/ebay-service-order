# ebay-service-order

### Masters in Software Development @ CIT 2017

### Overview
This service is charged with managing orders. It can be used by Alaname to save eBay generated orders into the web DB in Weborder format. From here they are picked up by Sync and downloaded into the retailers POS for management. When they are tendered at the POS, this service is also charged with updating the eBay account with the status of the order.

### Server Side Code
This service uses the Slim 3 framework offering its resources as a restful API. The resources offered can be seen at the homepage of the service at order.alaname.com

### Code Structure
 Order
 |--classes
 |   |--DB.php
 |--config
 |   |--Credentials.php
 |--public
 |   |--.htaccess // makes the service use the front controller pattern
 |   |--favicon.ico
 |   |--index.php // the landing page for all calls to the service
 |--resources
 |   |--Homepage.php
 |   |--Orders.php
 |--vendor
 |   |--3rd party included packages (all Slim stuff)
 |--composer      // A PHP dependency manager

All requests go through index.php where they are routed to the relevant resource. Because of the small size of the service I haven't used route files but instead passed requests directly to methods in the relevant resources.
