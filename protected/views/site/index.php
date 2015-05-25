<?php $this->pageTitle=Yii::app()->name; ?>

<h2>Biblioteca</h2>
<h3>Lic. Pedro Vélez y Zúñiga</h3>
<br><br>

<section class="services grid-wrap">	
	<article class="grid col-one-third mq3-col-full">
		<h5>Misión</h5>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
	</article>
	
	<article class="grid col-one-third mq3-col-full">
		<h5>Visión</h5>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
	</article>
	
	<article class="grid col-one-third mq3-col-full">
		<h5>Valores</h5>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
	</article>
</section>
<br><br>
<ul class="rslides">
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/bellas_artes.png" alt="Bellas Artes"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/biografia.png" alt="Biografia"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/centro.png" alt="Centro"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/per_3.png" alt="Personal"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/consulta.png" alt="Consulta"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/fachada.png" alt="Fachada"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/literatura.png" alt="Literatura"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/personaluno.png" alt="Personal"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/sala.png" alt="Sala"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/sala_dos.png" alt="Salas"></li>
	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gallery/tecnologia.png" alt="Tecnologia"></li>
</ul>

<br><br>

<section class="works grid-wrap">
	
	<figure class="grid col-one-quarter mq2-col-one-half">
		<a href="#">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img2.jpg" alt="">
		<span class="zoom"></span>
		</a>
		<figcaption>
			<a href="#" class="arrow">Project page!</a>
			<p>Lorem ipsum dolor set amet</p>
		</figcaption>
	</figure>

	<figure class="grid col-one-quarter mq2-col-one-half">
		<a href="#">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img.jpg" alt="">
		<span class="zoom"></span>
		</a>
		<figcaption>
			<a href="#" class="arrow">Project x</a>
			<p>Lorem ipsum dolor set amet</p>
		</figcaption>
	</figure>

	<figure class="grid col-one-quarter mq2-col-one-half">
		<a href="#">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img.jpg" alt="">
		<span class="zoom"></span>
		</a>
		<figcaption>
			<a href="#" class="arrow">Project x</a>
			<p>Lorem ipsum dolor set amet</p>
		</figcaption>
	</figure>

	<figure class="grid col-one-quarter mq2-col-one-half">
		<a href="#">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img.jpg" alt="">
		<span class="zoom"></span>
		</a>
		<figcaption>
			<a href="#" class="arrow">Project x</a>
			<p>Lorem ipsum dolor set amet</p>
		</figcaption>
	</figure>
</section>


<style type="text/css">
h2 h3 {
	text-align: center;
}

.rslides {
  position: relative;
  list-style: none;
  overflow: hidden;
  width: 100%;
  padding: 0;
  margin: 0;
}

.rslides li {
  -webkit-backface-visibility: hidden;
  position: absolute;
  display: none;
  width: 100%;
  left: 0;
  top: 0;
}

.rslides li:first-child {
  position: relative;
  display: block;
  float: left;
}

.rslides img {
  display: block;
  height: auto;
  float: left;
  width: 100%;
  border: 0;
}
</style>

<script type="text/javascript">
	$(function() {
		$(".rslides").responsiveSlides();
	});
</script>
