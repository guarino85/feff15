<?php spl_autoload_register('class_autoloader'); ?>
<?php
	$month = 4;
	$year = 2013;
	$days = array(19, 20, 21, 22, 23, 24, 25, 26, 27);
	$theatres = TheatreModel::getTheatreList();
	$country = CountryModel::getCountryList();
?>
<header>
	<span class="float-left">FAR EAST FILM FESTIVAL</span>
	<span class="float-right"><a href="javascript:void(0)" id="menu">&#9776;</a></span>
</header>
<section id="main-content">
	<img src="img/header.jpg" id="feff15-header" />
	<ul>
		<?php foreach($days as $day){
			$events = EventModel::getEventList($day); ?>
			<li id="<?php echo $day ?>-april">
				<h1><?php echo date('l d F Y', mktime(0,0,0,$month,$day,$year)) ?></h1>
				<ul>
					<?php foreach($events as $event){ ?>
						<li>
							<h2><?php echo $event->fields->movie ?></h2>
							<section class="movie-info">
								<span class="datetime"><?php echo event_date($event->fields->date) ?></span>
								<?php if($event->fields->director != '') { ?><span class="director"><?php echo $event->fields->director ?></span><?php } ?>
								<span class="country"><?php echo $event->getCountries() ?></span>
								<span class="length"><?php echo event_length($event->fields->length) ?></span>
								<?php if($event->fields->year > 0) { ?><span class="year"><?php echo $event->fields->year ?></span><?php } ?>
								<span class="theatre"><?php echo $event->getTheatre() ?></span>
							</section>
							<img src="img/movies/<?php echo $event->fields->id ?>.jpeg" title="<?php echo $event->fields->movie ?>" />
							<section class="movie-plot"><?php echo $event->getPlot() ?></section>
						</li>
					<?php } ?>
				</ul>
			</li>
		<?php } ?>
	</ul>
	<aside>
		<ul>
			<?php foreach($days as $day){ ?>
				<li id="calendar-<?php echo $day ?>"><a href="#<?php echo $day ?>-april"<?php if(date('d')==$day) echo ' class="active"' ?>><?php echo $day ?></a></li>
			<?php }?>
		</ul>
	</aside>
</section>