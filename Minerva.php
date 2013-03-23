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

		$this->html( 'headelement' ); // This probably includes the body tag
?><h1 id="firstHeading" class="firstHeading" lang="<?php
		$this->data['pageLanguage'] = $this->getSkin()->getTitle()->getPageViewLanguage()->getCode();
		$this->html( 'pageLanguage' );
	?>"><span dir="auto"><?php $this->html('title') ?></span></h1>
		<!-- start content -->
<?php $this->html('bodytext') ?>
		<!-- end content -->
<?php
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
		wfRestoreWarnings();
	} // end of execute() method
}
