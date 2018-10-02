<?php

namespace common\models;

use common\models\Elastic;

use Elasticsearch\ClientBuilder;


/**

 * ArticlesSearch represents the model behind the search form about `app\models\Articles`.

 */

class Search extends ElasticProducts

{

  public function Searches($value) {
    $searchs = $value['search'];
    //$client = new Client();
    $hosts = ['127.0.0.1:9200'];              // Replace with your host
    $client = ClientBuilder::create()// Instantiate a new ClientBuilder
    ->setHosts($hosts)// Set the hosts
    ->build();              // Build the client object
    $params['index'] = ElasticProducts::index();
    $params['type'] = ElasticProducts::type();
    $params['body']['query']['match']['title'] = $searchs;

    return $client->search($params);

  }
}