	<?php
/**
 * 
 * WolfSlider is a free software: you can redistribute it and/or modify it under the terms
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
 * Portions copyright 2010-2011 Celtic Wolf, Inc.
 * http://www.celticwolf.com/
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc =& JFactory::getDocument();
$lt_moostyle = "
#wolfslider_wrap {width: $wolfslider_wrap_width; text-align:left; margin-right: auto; margin-left: auto;}
#wolfslider_wrap .buttons { text-align: center; clear: both; display: block; margin-top: 0.5em; }
.wolfslider_container{position:relative; width: $wolfslider_width; height: $wolfslider_height; overflow:hidden; margin-left: 40px;}
#wolfsliders {position:absolute; z-index: 1;}
#wolfsliders div{width: $wolfslider_width;	float:left;}
#wolfslider_next {position:relative; float: right; z-index: 2; display: none; margin-top: 70px; margin-left: 10px; }
#wolfslider_prev {position:relative; float: left; z-index: 2; display: none; margin-top: 70px; margin-right: 10px; }
.buttons#wolfslider_handles { display: none; visibility: hidden; }
.buttons#wolfslider_handles_more { display: none; visibility: hidden; }
#wolfslider_playback { display: none; visibility: hidden; }
#wolfslider_playback_controls { display: none; visibility: hidden; }
";
$doc->addStyleDeclaration( $lt_moostyle );

if ($wolfslider_mootools)
{
	JHTML::_('behavior.mootools');
	$headerstuff=$doc->getHeadData();
	$key = JURI::base( true ) . '/media/system/js/mootools.js';
	unset( $headerstuff['scripts'][$key] );
	$doc->setHeadData($headerstuff);
	$doc->addScript('modules/mod_wolfslider/lt_wolfslider/mootools-1.2-core.js');
}
$doc->addScript('modules/mod_wolfslider/lt_wolfslider/lt_wolfslider.js');

$mooscript = "
	window.addEvent('domready',function(){
		var slide_picker = $$('$slide_picker_selector');
		var nS8 = new noobSlide({
			box: $('wolfsliders'),
			items: $$('#wolfsliders > div'),
			fade: $wolfslider_fade,
			size: $wolfslider_width_nopx,
			autoPlay: $wolfslider_autoplay,
			interval: $wolfslider_speed,
			handles: slide_picker,
			addButtons: {previous: $('wolfslider_prev'), play: $('wolfslider_play'), stop: $('wolfslider_stop'), playback: $('wolfslider_playback'), next: $('wolfslider_next') },
			onWalk: function(currentItem, currentHandle)
			{
				$$(this.handles, slide_picker).removeClass('active');
				$$(currentHandle, slide_picker[this.currentIndex]).addClass('active');
			}
		});
		nS8.addActionButtons('previous', $$('#wolfsliders .prev'));
		nS8.addActionButtons('next', $$('#wolfsliders .next'));
		//nS8.addHandleButtons(slide_picker);
		nS8.walk(0, false, true);
	});";
$doc->addScriptDeclaration( $mooscript );

?>
<div id="wolfslider_wrap">

<?php
// If the configuration specifies that we're going to use a slide picker module
if ($use_slide_picker)
{
	echo "<div id=\"wolfslider_slide_picker_wrapper\">\n";
	$slide_picker_mod =& JModuleHelper::getModules($slide_picker_pos);
	foreach ($slide_picker_mod as $picker)
	{
		$slide_picker_attribs['style'] = 'xhtml';
		echo JModuleHelper::renderModule($picker, $slide_picker_attribs);
	}
	echo "</div>\n";
}
?>
	<span id="wolfslider_prev">
		<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/previous.png" alt="Prev" width="40" height="40" />
	</span>
	<span id="wolfslider_next">
		<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/next.png" alt="Next" width="40" height="40" />
	</span> 
 
	<div class="wolfslider_container"> 
		<div id="wolfsliders"> 
        
<?php 
jimport('joomla.application.module.helper');

$wolfslidermod =& JModuleHelper::getModules($wolfslider_pos);
foreach ($wolfslidermod as $display)
{
	$wolfslider_attribs['style'] = 'xhtml';
	echo JModuleHelper::renderModule($display, $wolfslider_attribs);
} 

?>

		</div> 
	</div> 
	
	<p class="buttons" id="wolfslider_handles">
		<span>Pane 1</span>
		<span>Pane 2</span>
		<span>Pane 3</span>
		<span>Pane 4</span>
	</p>
	<p id="wolfslider_playback_controls" class="buttons">
		<span id="wolfslider_playback">&lt;Playback</span>
		<span id="wolfslider_stop">
			<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/pause.png" alt="play" width="40" height="40" />
		</span>
		<span id="wolfslider_play">
			<img src="<?php echo JURI::base();?>modules/mod_wolfslider/lt_wolfslider/play.png" alt="play" width="40" height="40" />
		</span>
	</p> 
 
	<p class="buttons" id="wolfslider_handles_more"> 
		<span>1</span> 
		<span>2</span> 
		<span>3</span> 
		<span>4</span> 
	</p> 
</div>