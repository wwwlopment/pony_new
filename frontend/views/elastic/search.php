<?php
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;

$this->title = 'Search';
?>
<div class="container-fluid">
  <h1>Search Result for <?php echo "<span class='label label-success'>" . $query . "</span>" ?></h1>
  <?php
//  $result = $dataProvider->getModels();
  $result = $dataProvider['hits']['hits'];
//echo var_dump($result);die();

    echo "<div class='row'>";



  foreach ($result as $key) {
    echo "<div class='panel panel-default'>";
 //echo var_dump($key['_source']);die();
    //foreach ($key['_source'] as $key2 => $value) {

       // echo var_dump($key['_source']['title']);
echo "<div class='panel-heading'><strong>" . $key['_source']['title']['0'] . "</strong></div>";

echo "<div class='panel-body'>" . BaseStringHelper::truncateWords($key['_source']['description']['0'], 50, '...', true) . "<br>";

echo '<img width="150px" src="' . $key['_source']['image']['0'] . '"></div>';
echo '<div class="panel-footer">'.Html::a('Перейти', ['site/view', 'id' => $key['_source']['id']], ['class'=>'btn btn-success']).'</div>';
echo "</div>";


/*
   //   if ($key == "title") {
        echo "<div class='panel-heading'><strong>" . $key[$value['0']] . "</strong></div>";
     // }
      if ($key == "description") {
        echo "<div class='panel-body'>" . BaseStringHelper::truncateWords($value['0'], 50, '...', true) . "<br>";
      }
      if ($key == "image") {
        echo '<img width="150px" src="' . $value['0'] . '"></div>';
      }

      if ($key == "id") {
       echo '<span class="label label-success">'.Html::a('Купити', ['site/view', 'id' => $value]).'</span>';
                                                       // echo Html::a('Купити', ['site/view', 'id' => $value]);

      //  echo '<span class="label label-success">' . $value['0'] . '</span></div>';
      }
*/


    }

    echo "</div>";

  //}


  ?>

</div>