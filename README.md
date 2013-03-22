Minerva
=======

 She was born from the godhead of Jupiter with weapons!
 
Installation
============

To install in MediaWiki, add...
```php
'SkinMinerva' => 'skins/Minerva.php',
```
... to includes/AutoLoader.php. Then add...
```php
'skins.minerva' => array(
	'styles' => array( 'minerva/main.css' => array( 'media' => 'screen' ) ),
	'remoteBasePath' => $GLOBALS['wgStylePath'],
	'localBasePath' => $GLOBALS['wgStyleDirectory'],
),
```
... to resources/Resources.php.
