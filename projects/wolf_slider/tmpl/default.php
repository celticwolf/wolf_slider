<?php // no direct access
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
 *@copyright (C) 2008 LaunchTulsa.com
 *@link http://launchtulsa.com Official website
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

$doc =& JFactory::getDocument();
$lt_moostyle = "
#lt_mooslider_wrap {width: $mooslider_wrap_width; text-align:left; margin-right: auto; margin-left: auto;}
#lt_mooslider_wrap .buttons{text-align:center;clear:both;display: none;visibility: hidden;}
.lt_mooslider_container{position:relative; width: $mooslider_width; height: $mooslider_height; overflow:hidden; margin-left: 40px;}
#lt_moosliders {position:absolute; z-index: 20;}
#lt_moosliders div{width: $mooslider_width;	float:left;}
#lt_mooslider_next {position:relative; float: right; z-index: 99; display: block; margin-top: 70px; margin-left: 10px; }
#lt_mooslider_prev {position:relative; float: left; z-index: 99; display: block; margin-top: 70px; margin-right: 10px; }
.lt_link {font-size: 0.6em; }
";
$doc->addStyleDeclaration( $lt_moostyle );

if ($mooslider_mootools == "1") {
	JHTML::_('behavior.mootools');
  	$headerstuff=$doc->getHeadData();
  	$key = JURI::base( true ) . '/media/system/js/mootools.js';
  	unset( $headerstuff['scripts'][$key] );
  	$doc->setHeadData($headerstuff);
	$doc->addScript('modules/mod_mooslider/lt_mooslider/mootools-1.2-core.js');
}
$doc->addScript('modules/mod_mooslider/lt_mooslider/lt_mooslider.js');

$mooscript = "window.addEvent('domready',function(){
									
		var lt_mooslider_handles_more = $$('#lt_mooslider_handles_more span');
		var nS8 = new noobSlide({
			box: $('lt_moosliders'),
			items: $$('#lt_moosliders div'),
			size: $mooslider_sliderwidth,
			$mooslider_autoplay,
			interval: $mooslider_speed,
			handles: $$('#lt_mooslider_handles span'),
			addButtons: {previous: $('lt_mooslider_prev'), play: $('lt_mooslider_play'), stop: $('lt_mooslider_stop'), playback: $('lt_mooslider_playback'), next: $('lt_mooslider_next') },
			onWalk: function(currentItem,currentHandle){

				$$(this.handles,lt_mooslider_handles_more).removeClass('active');
				$$(currentHandle,lt_mooslider_handles_more[this.currentIndex]).addClass('active');
			}
		});
		nS8.addActionButtons('previous',$$('#lt_moosliders .prev'));
		nS8.addActionButtons('next',$$('#lt_moosliders .next'));
		nS8.addHandleButtons(lt_mooslider_handles_more);
		nS8.walk(0,false,true);
 
	});";
$doc->addScriptDeclaration( $mooscript );
?>
<div id="lt_mooslider_wrap">

	<span id="lt_mooslider_prev">
    <img src="<?php echo JURI::base();?>modules/mod_mooslider/lt_mooslider/left.png" alt="Prev" width="40" height="40" />
    </span>
    <span id="lt_mooslider_next">
    <img src="<?php echo JURI::base();?>modules/mod_mooslider/lt_mooslider/right.png" alt="Next" width="40" height="40" />
    </span> 
 
	<div class="lt_mooslider_container"> 
		<div id="lt_moosliders"> 
        
			<?php 
			
			jimport('joomla.application.module.helper');

			$mooslidermod =& JModuleHelper::getModules($mooslider_pos1);
			foreach ($mooslidermod as $display)
			{ $mooslider_attribs['style'] = 'xhtml';
			echo JModuleHelper::renderModule($display, $mooslider_attribs);
			} 
		
			$mooslidermod =& JModuleHelper::getModules($mooslider_pos2);
			foreach ($mooslidermod as $display)
			{ $mooslider_attribs['style'] = 'xhtml';
			echo JModuleHelper::renderModule($display, $mooslider_attribs);
			} 
			
			$mooslidermod =& JModuleHelper::getModules($mooslider_pos3);
			foreach ($mooslidermod as $display)
			{ $mooslider_attribs['style'] = 'xhtml';
			echo JModuleHelper::renderModule($display, $mooslider_attribs);
			} 
			
			$mooslidermod =& JModuleHelper::getModules($mooslider_pos4);
			foreach ($mooslidermod as $display)
			{ $mooslider_attribs['style'] = 'xhtml';
			echo JModuleHelper::renderModule($display, $mooslider_attribs);
			} 
			
			$mooslidermod =& JModuleHelper::getModules($mooslider_pos5);
			foreach ($mooslidermod as $display)
			{ $mooslider_attribs['style'] = 'xhtml';
			echo JModuleHelper::renderModule($display, $mooslider_attribs);
			} 
			
			$mooslidermod =& JModuleHelper::getModules($mooslider_pos6);
			foreach ($mooslidermod as $display)
			{ $mooslider_attribs['style'] = 'xhtml';
			echo JModuleHelper::renderModule($display, $mooslider_attribs);
			} 
			
			?>
            
		</div> 
	</div> 
 
	
 	<p class="buttons" id="lt_mooslider_handles"> 
		<span>Pane 1</span> 
		<span>Pane 2</span> 
		<span>Pane 3</span> 
		<span>Pane 4</span> 
	</p>
	<p class="buttons"> 
		<span id="lt_mooslider_playback">&lt;Playback</span> 
		<span id="lt_mooslider_stop">Stop</span> 
		<span id="lt_mooslider_play">Play &gt;</span> 
	</p> 
 
	<p class="buttons" id="lt_mooslider_handles_more"> 
		<span>1</span> 
		<span>2</span> 
		<span>3</span> 
		<span>4</span> 
	</p> 
    

<?php 
if ($mooslider_link == "1") {
	echo "<span class='lt_link'><a href='http://launchtulsa.com'>LaunchTulsa.com</a></span>";
	}
	
?>



</div>