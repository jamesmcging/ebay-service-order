<?php

namespace Order\resources;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * Description of Homepage
 *
 * @author James McGing <jamesmcging@gmail.com>
 */
class Homepage {
  
  public function getHomePage(Request $objRequest, Response $objResponse) {  

    $sHTML = <<<HTML
      <!DOCTYPE html>
      <html lang="en">
            
        <head>
          <meta charset="utf-8">
          <title>eBay Project - order interface</title>
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="Ebay prototype for Masters in Software Development at CIT">
          <meta name="author" content="jamesmcging@gmail.com">
        </head>
            
        <body>
          <h1>Orders Interface Resource</h1>
          <p>This is a service that interfaces with the local store orders service. List of resources offered:</p>
          <ul>
            <li>GET <a href="/">/</a> This page</li>
            <li>Orders</li>
            <ul>
              <li>POST /order - Add order to the local order DB</li>
              <li>GET <a href="/order/1">/order/{itemID}</a> - Retrieve specific order from the local store DB</li>
            </ul>
          </ul>
        </body>
            
      </html>
HTML;
  
    $objResponse->getBody()->write($sHTML);

    return $objResponse;
  }
}
