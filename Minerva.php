<?php
/**
 * Minerva: Born from the godhead of Jupiter with weapons!
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );


// load mustache template engine
require 'mustache.php/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

/**
 * Inherit main code from SkinTemplate, set up the CSS and template.
 * @ingroup Skins
 */
class SkinMinerva extends SkinTemplate {
	var $skinname = 'minerva', $stylename = 'minerva',
		$template = 'MinervaTemplate', $useHeadElement = true;
		
	/**
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		// Add the ResourceLoader module to the page output
		$out->addModuleStyles( 'skins.minerva' );
	}
}

class MinervaTemplate extends BaseTemplate {

	/**
	 * Template filter callback for Minerva skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();
		$localTemplateBasePath = dirname( __FILE__ );
		$localPath = "{$localTemplateBasePath}/minerva/templates/main.html";
		if ( file_exists( $localPath ) ) {
			$template = file_get_contents( $localPath );
		} else {
			// FIXME: throw error
		}

		$m = new Mustache_Engine;
		echo $m->render( $template,  $this->data );
		wfRestoreWarnings();
	} // end of execute() method
}

// add skin to MediaWiki
$wgAutoloadClasses += array(
	'SkinMinerva' => 'skins/Minerva.php',
);
$wgResourceModules += array(
	'skins.minerva' => array(
		'styles' => array( 'minerva/styles/main.css' => array( 'media' => 'screen' ) ),
		'remoteBasePath' => $GLOBALS['wgStylePath'],
		'localBasePath' => $GLOBALS['wgStyleDirectory'],
	),
);
