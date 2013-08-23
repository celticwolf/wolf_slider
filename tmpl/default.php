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
 *@author LaunchTulsa.com, Celtic Wolf, Inc.
 *@copyright (C) 2008 LaunchTulsa.com, 2010-2011, 2013 Celtic Wolf, Inc.
 *@link http://www.celticwolf.com/
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc =& JFactory::getDocument();
$moostyle = "
#wolfslider_wrap { width: $wolfslider_wrap_width; text-align:left; margin-right: auto; margin-left: auto; }
.wolfslider_container { position:relative; width: $wolfslider_width; height: $wolfslider_height; overflow:hidden; margin-left: 50px; }
#wolfsliders { position:absolute; z-index: $slides_z_index; }
#wolfsliders div { float:left; height: $wolfslider_height; margin: 0; padding: 0; width: $wolfslider_width; }
#wolfslider_next { position:relative; float: right; z-index: $slide_buttons_z_index; display: $playback_buttons_display; margin-top: 70px; margin-left: 10px; }
#wolfslider_prev { position:relative; float: left; z-index: $slide_buttons_z_index; display: $playback_buttons_display; margin-top: 70px; margin-right: 10px; }
#wolfslider_playback_controls { clear: both; display: $playback_buttons_display; margin-top: 0.5em; text-align: center; visibility: $playback_buttons_visible; }
";
$doc->addStyleDeclaration($moostyle);

if ($wolfslider_mootools)
{
	JHTML::_('behavior.mootools');
	$headerstuff=$doc->getHeadData();
	$key = JURI::base( true ) . '/media/system/js/mootools.js';
	unset( $headerstuff['scripts'][$key] );
	$doc->setHeadData($headerstuff);
	$doc->addScript('modules/mod_wolfslider/wolfslider/mootools-1.2-core.js');
}
$doc->addScript('modules/mod_wolfslider/wolfslider/_class.noobSlide.js');

$mooscript = "
	window.addEvent('domready',function(){
		var slide_picker = $$('$slide_picker_selector');
		var ns = new noobSlide({
			box: $('wolfsliders'),
			items: $$('#wolfsliders > div'),
			size: $wolfslider_size,
			mode: '$wolfslider_mode',
			fade: $wolfslider_fade,
			autoPlay: $wolfslider_autoplay,
			interval: $wolfslider_speed,
			handles: slide_picker,
			handle_event: '$wolfslider_event',
			addButtons: {previous: $('wolfslider_prev'), play: $('wolfslider_play'), stop: $('wolfslider_stop'), next: $('wolfslider_next') },
			onWalk: function(currentItem, currentHandle)
			{
				$$(this.handles, slide_picker).removeClass('active');
				$$(currentHandle, slide_picker[this.currentIndex]).addClass('active');
			}
		});
		ns.addActionButtons('previous', $$('#wolfsliders .prev'));
		ns.addActionButtons('next', $$('#wolfsliders .next'));
		//ns.addHandleButtons(slide_picker);
		ns.walk(0, false, true);
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
		<img src="<?php echo JURI::base();?>modules/mod_wolfslider/wolfslider/previous.png" alt="Prev" width="40" height="40" />
	</span>
	<span id="wolfslider_next">
		<img src="<?php echo JURI::base();?>modules/mod_wolfslider/wolfslider/next.png" alt="Next" width="40" height="40" />
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

	<p id="wolfslider_playback_controls">
		<span id="wolfslider_stop">
			<img src="<?php echo JURI::base();?>modules/mod_wolfslider/wolfslider/pause.png" alt="play" width="40" height="40" />
		</span>
		<span id="wolfslider_play">
			<img src="<?php echo JURI::base();?>modules/mod_wolfslider/wolfslider/play.png" alt="play" width="40" height="40" />
		</span>
	</p>
</div>
