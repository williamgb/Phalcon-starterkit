<?php
/*
|--------------------------------------------------------------------------
| Loader
|--------------------------------------------------------------------------
|
| Register directories on which "not found" classes could be found
| 
*/
$loader->registerDirs(array(

	$config->application->controllersDir,
	$config->application->modelsDir,
	$config->application->librariesDir

));
