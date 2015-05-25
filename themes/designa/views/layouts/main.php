<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="UTF-8">
	
	<!-- Remove this line if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width">
	
	<meta name="description" content="Designa Studio, a HTML5 / CSS3 template.">
	<meta name="author" content="Sylvain Lafitte, Web Designer, sylvainlafitte.com">
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.ico">
	<link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.png">

	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">

	<header id="navtop">
		<a href="#" class="logo fleft">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="Biblioteca Municipal">
		</a>
		<div class="fright">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		</div>		
	</header>


<div class="home-page main">
	<section class="grid-wrap" >
		<header class="grid col-full">
			<nav class="nav">
				<?php 
					$biblio = 0;
					if(isset(Yii::app()->user->type2)) {
						$biblio = 1;
						if(Yii::app()->user->type2 > 0){
							$biblio = 2;
						}
					}

					$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Inicio', 'url'=>array('site/index')),
						array('label'=>'Ver', 'visible'=>$biblio==2?true:false, 'url'=>array('#'), 'items'=>array(
							array('label'=>'Usuarios', 'url'=>array('user/index')),
							array('label'=>'Préstamos', 'url'=>array('loan/index')),
							array('label'=>'Mensajes', 'url'=>array('message/index')),
						)),
						array('label'=>'Libros', 'url'=>array('book/index'), 'items'=>array(
							array('label'=>'Estante Virtual', 'url'=>array('book/index?img=true')),
							array('label'=>'Acervos', 'url'=>array('book/index')),
							array('label'=>'Recomendacion', 'url'=>array('recommendation/index')),
							array('label'=>'Clasificación', 'url'=>array('site/page', 'view'=>'clasificacion')),
						)),
						array('label'=>'Información', 'url'=>array('#'), 'items'=>array(
							array('label'=>'Préstamos', 'url'=>array('site/page', 'view'=>'prestamos')),
							array('label'=>'Carnet', 'url'=>array('site/page', 'view'=>'carnet')),
							array('label'=>'Calendario', 'url'=>array('site/page', 'view'=>'calendario')),
							array('label'=>'Servicio Local', 'url'=>array('site/page', 'view'=>'local')),
						)),
						array('label'=>'Servicios', 'url'=>array('#'), 'items'=>array(
							array('label'=>'Cursos', 'url'=>array('course/index')),
							array('label'=>'Foros', 'url'=>array('forum/index')),
							array('label'=>'Juegos', 'url'=>array('game/index')),
							array('label'=>'Video', 'url'=>array('site/page', 'view'=>'video')),
						)),
						array('label'=>'Contacto', 'url'=>array('message/create'), 'items'=>array(
							array('label'=>'Mensajes', 'visible'=>$biblio==1?true:false, 'url'=>array('message/create')),
							array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
						)),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>Yii::app()->user->name, 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
							array('label'=>'Cerrar', 'url'=>array('/site/logout')),
						))
					),
				)); ?>
			</nav>
		</header>
		
		<div class="grid col-full mq2-col-full">
			<?php echo $content; ?>
		</div>

	</section>

</div><!--main-->
<div class="divide-top">
	<footer class="grid-wrap">
		<ul class="grid col-one-third social">
			<li><a href="#">RSS</a></li>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Google+</a></li>
			<li><a href="#">Flickr</a></li>
		</ul>
	
		<div class="up grid col-one-third ">
			<a href="#navtop" title="Go back up">&uarr;</a>
		</div>
		
		<nav class="grid col-one-third ">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
		</nav>
	</footer>
</div>

</div>

<!-- Javascript - jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.3.min.js"><\/script>')</script>

<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr.js"></script>
<![endif]-->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/responsiveslides.min.js"></script>

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>

<style type="text/css">
.nav ul {
  list-style: none;
  background-color: #eee;
  text-align: center;
  padding: 0;
  margin: 0;
  box-shadow: 0px 2px 5px #888888;
}

.nav li {
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  text-align: left;
}

.nav a {
  text-decoration: none;
  color: #000;
  display: block;
  padding-left: 15px;
  border-bottom: 1px solid #999;
  transition: .3s background-color;
  transition: 2s color;
}

.nav a:hover {
  color: #999;
  background-color: #ffefff;
}

.nav a.active {
  background-color: #aaa;
  color: #444;
  cursor: default;
}

/* Sub Menus */
.nav li li {
  font-size: .8em;
}

/*******************************************
   Style menu for larger screens

   Using 650px (130px each * 5 items), but ems
   or other values could be used depending on other factors
********************************************/

@media screen and (min-width: 650px) {
  .nav li {
    width: 130px;
    border-bottom: none;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    display: inline-block;
    margin-right: -4px;
  }

  .nav a {
    border-bottom: none;
  }

  .nav > ul > li {
    text-align: center;
  }

  .nav > ul > li > a {
    padding-left: 0;
  }

  /* Sub Menus */
  .nav li ul {
    position: absolute;
    display: none;
    width: inherit;
  }

  .nav li:hover ul {
    display: block;
  }

  .nav li ul li {
    display: block;
  }
}
</style>