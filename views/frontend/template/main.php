<?php defined('SYSPATH') or die('No direct access allowed.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<?php echo StaticCss::instance()->getCssAll()?>
	<title><?php echo $title?></title>
</head>
<body>
	<div id="main">
		<div id="top">
			<div id="menu_top">
				<div class="corner_left"></div>
				<ul class="links">
					<li><a href="#">Главная</a></li>
					<li><a href="#">Модули</a></li>
					<li><a href="#">Разработчики</a></li>
				</ul>
				<div id="profile"></div>
				<div class="corner_right"></div>
			</div>
			<div id="logo">
				<?php echo HTML::anchor(
					Route::get('default')->uri(array('lang' => I18n::lang(), 'controller' => NULL, 'action' => NULL)),
					HTML::image('media/i/logo.png', array('alt' => '')),
					array('title' => '')
				)?>
			</div>
			<div id="search">
				<input type="text" name="search" /><button>искать</button>
			</div>
		</div>
		<div id="center">
			<div id="content"><?php echo $content?></div>
			<div id="sidebar"><?php echo $sidebar?></div>
		</div>
		<div id="empty"></div>
		<div id="footer">
			<div class="column">column 1</div>
			<div class="column">column 2</div>
			<div class="column">column 3</div>
		</div>
	</div>
<?php echo StaticJs::instance()->getJsAll()?>
<?php echo $debug?>
</body>
</html>