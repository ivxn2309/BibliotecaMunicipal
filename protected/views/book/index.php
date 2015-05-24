<?php if(!$virtual): ?>

  <?php
  /* @var $this BookController */
  /* @var $dataProvider CActiveDataProvider */

  $this->breadcrumbs=array(
  	'Ver',
  	'Acervos',
  );
  ?>

  <h2>Libros</h2>

  <?php 
      if(Yii::app()->user->type === "1")
      	echo CHtml::link('Registrar libro',array('book/create'),array('class'=>'btn btn-default')); 
  ?>
  <?php $this->widget(
      'booster.widgets.TbGridView',
      array(
      	'type' => 'striped bordered condensed',
          'dataProvider' => $gridDataProvider,
          'template' => "{items}\n{pager}",
          //'filter' => $book->search(),
          'columns' => $gridColumns,
      )
  );?>


  <?php if(Yii::app()->user->type !== "1"): ?>
  <style type="text/css">
  	a.view, a.update, a.delete {
  		visibility: hidden;
  	}
  </style>
  <?php endif; ?>
<?php else: ?>

  <?php
  /* @var $this BookController */
  /* @var $dataProvider CActiveDataProvider */

  $this->breadcrumbs=array(
    'Ver',
    'Estante Virtual',
  );
  ?>

  <h2>Estante Virtual</h2>
  <?php
    $len = sizeof($models);
  ?>

  <?php if($len != 0): ?>
    <section class="grid-wrap">

      <header class="grid col-full"></header>
      
      <?php for($i=0; $i<$len; $i++): ?>
      <figure class="grid col-one-quarter mq2-col-one-half">
        <a href="#">
          <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/books/<?php echo $models[$i]->image ?>" alt="Sin vista previa">
        </a>
        <figcaption>
          <p class="aut"><?php echo $models[$i]->author; ?></p>
          <h4 class="tit"><?php echo $models[$i]->title; ?></h4>
          <p class="cls"><?php echo $models[$i]->classification; ?></p>
        </figcaption>
      </figure>
      <?php endfor; ?>
    </section>
  <?php else: ?>
    <h3>Esta sección se encuentra vacía por el momento</h3>
  <?php endif; ?>
  <style type="text/css">
    .grid-wrap figure {
      text-align: center;
      margin-bottom: 50px;
    }

    .grid-wrap figure a img {
      box-shadow: 0px 5px 6px #000;
      margin-bottom: 20px;
      height: 165px;
      width: 100px;
    }

    .grid-wrap figure figcaption .aut {
      height: 30px;
    }

    .grid-wrap figure figcaption .tit {
      height: 40px;
    }

    .grid-wrap figure figcaption .cls {
      height: 30px;
    }
  </style>

<?php endif; ?>

