<?php
/**
 * 
 * MooSlider is a free software: you can redistribute it and/or modify it under the terms
 * of the GNU General Public License as published by the Free Software Foundation,
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *@author LaunchTulsa.com
 *@copyright (C) 2008 LaunchTulsa.com, 2010 Celtic Wolf, Inc.
 *@link http://launchtulsa.com Official website
 *
 * Portions copyright 2010 Celtic Wolf, Inc.
 * http://www.celticwolf.com/
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc =& JFactory::getDocument();
$lt_moostyle = "
#lt_wolfslider_wrap {width: $wolfslider_wrap_width; text-align:left; margin-right: auto; margin-left: auto;}
#lt_wolfslider_wrap .buttons { text-align: center; clear: both; display: block; margin-top: 0.5em; }
.lt_wolfslider_container{position:relative; width: $wolfslider_width; height: $wolfslider_height; overflow:hidden; margin-left: 40px;}
#lt_wolfsliders {position:absolute; z-index: 20;}
#lt_wolfsliders div{width: $wolfslider_width;	float:left;}
#lt_wolfslider_next {position:relative; float: right; z-index: 99; display: block; margin-top: 70px; margin-left: 10px; }
#lt_wolfslider_prev {position:relative; float: left; z-index: 99; display: block; margin-top: 70px; margin-right: 10px; }
.lt_link {font-size: 0.6em; }
.buttons#lt_wolfslider_handles { display: none; visibility: hidden; }
.buttons#lt_wolfslider_handles_more { display: none; visibility: hidden; }
#lt_wolfslider_playback { display: none; visibility: hidden; }
";
$doc->addStyleDeclaration( $lt_moostyle );

if ($wolfslider_mootools == "1") {
	JHTML::_('behavior.mootools');
	$headerstuff=$doc->getHeadData();
	$key = JURI::base( true ) . '/media/system/js/mootools.js';
	unset( $headerstuff['scripts'][$key] );
	$doc->setHeadData($headerstuff);
	$doc->addScript('modules/mod_wolfslider/lt_wolfslider/mootools-1.2-core.js');
}
$doc->addScript('modules/mod_wolfslider/lt_wolfslider/lt_wolfslider.js');

$mooscript = "window.addEvent('domready',function(){

		var lt_wolfslider_handles_more = $$('#lt_wolfslider_handles_more span');
		var nS8 = new noobSlide({
			box: $('lt_wolfsliders'),
			items: $$('#lt_wolfsliders > div'),
			fade: $wolfslider_fade,
			size: $wolfslider_sliderwidth,
			$wolfslider_autoplay,
			interval: $wolfslider_speed,
			handles: $$('#lt_wolfslider_handles span'),
			addButtons: {previous: $('lt_wolfslider_prev'), play: $('lt_wolfslider_play'), stop: $('lt_wolfslider_stop'), playback: $('lt_wolfslider_playback'), next: $('lt_wolfslider_next') },
			onWalk: function(currentItem,currentHandle){

				$$(this.handles,lt_wolfslider_handles_more).removeClass('active');
				$$(currentHandle,lt_wolfslider_handles_more[this.currentIndex]).addClass('active');
			}
		});
		nS8.addActionButtons('previous',$$('#lt_wolfsliders .prev'));
		nS8.addActionButtons('next',$$('#lt_wolfsliders .next'));
		nS8.addHandleButtons(lt_wolfslider_handles_more);
		nS8.walk(0,false,true);
 
	});";
$doc->addScriptDeclaration( $mooscript );
?>
<div id="lt_wolfslider_wrap">

	<span id="lt_wolfslider_prev">
		<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/previous.png" alt="Prev" width="40" height="40" />
	</span>
	<span id="lt_wolfslider_next">
		<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/next.png" alt="Next" width="40" height="40" />
	</span> 
 
	<div class="lt_wolfslider_container"> 
		<div id="lt_wolfsliders"> 
        
<?php 
jimport('joomla.application.module.helper');

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos1);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos2);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos3);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos4);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos5);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos6);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

?>

		</div> 
	</div> 
	
	<p class="buttons" id="lt_wolfslider_handles">
		<span>Pane 1</span>
		<span>Pane 2</span>
		<span>Pane 3</span>
		<span>Pane 4</span>
	</p>
	<p class="buttons">
		<span id="lt_wolfslider_playback">&lt;Playback</span>
		<span id="lt_wolfslider_stop">
			<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/pause.png" alt="play" width="40" height="40" />
		</span>
		<span id="lt_wolfslider_play">
			<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/play.png" alt="play" width="40" height="40" />
		</span>
	</p> 
 
	<p class="buttons" id="lt_wolfslider_handles_more"> 
		<span>1</span> 
		<span>2</span> 
		<span>3</span> 
		<span>4</span> 
	</p> 

<?php 
if ($wolfslider_link == "1")
{
	echo "<span class='lt_link'><a href='http://launchtulsa.com'>LaunchTulsa.com</a></span>";
}
	
?>



</div>