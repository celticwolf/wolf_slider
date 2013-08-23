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
defined( "_JEXEC" ) or die( "Restricted access" );

define('MODE_HORIZONTAL', 'horizontal');
define('EVENT_CLICK', 'click');

$wolfslider_wrap_width	= intval($params->get('wolfslider_wrap_width', '600')) . 'px';
$wolfslider_width_nopx	= intval($params->get('wolfslider_width', '550'));
$wolfslider_width		= $wolfslider_width_nopx . 'px';
$wolfslider_height_nopx	= intval($params->get('wolfslider_height', '200'));
$wolfslider_height		= $wolfslider_height_nopx . 'px';
$wolfslider_effect		= $params->get('wolfslider_effect', MODE_HORIZONTAL);
$wolfslider_mootools	= intval($params->get('wolfslider_mootools', '1')) === 1;
$wolfslider_pos			= $params->get('wolfslider_pos', 'user1'); // Module to use in the 1st slide
$wolfslider_autoplay	= intval($params->get('wolfslider_autoplay', '1')) === 1 ? 'true' : 'false';
$wolfslider_speed		= intval($params->get('wolfslider_speed', '6')) * 1000;
$use_slide_picker		= intval($params->get('use_slide_picker', '0')) === 1;
$slide_picker_pos		= $params->get('slide_picker_pos', 'slide_picker1');
$slide_picker_selector	= $params->get('slide_picker_selector', '#wolfslider_handles_more span');
$wolfslider_event = $params->get('wolfslider_event', EVENT_CLICK);
$slides_z_index			= intval($params->get('slides_z_index', '1'));
$slide_buttons_z_index	= intval($params->get('slide_buttons_z_index', '2'));
$show_playback_buttons	= intval($params->get('show_playback_buttons', '0')) === 1;
$playback_buttons_display = $show_playback_buttons ? 'block' : 'none';
$playback_buttons_visible = $show_playback_buttons ? 'visible' : 'hidden';

// The fade effect is a separate parameter to the JavaScript function, but makes more sense
// from the user's perspective if it's combined with the horizontal vs. vertical sliding.
// To accommodate the user, we split it into a separate variable here.
$wolfslider_fade = (0 === strcasecmp($wolfslider_effect, 'fade')) ? 'true' : 'false';
$wolfslider_mode = (0 === strcasecmp($wolfslider_effect, 'fade')) ? MODE_HORIZONTAL : $wolfslider_effect;

// The size parameter to the noobSlide ctor should be the width of the slides
// if the effect is a horizontal slide, and the height if the effect is a vertical slide.
$wolfslider_size = (0 === strcasecmp($wolfslider_mode, MODE_HORIZONTAL)) ? $wolfslider_width_nopx : $wolfslider_height_nopx;

require( JModuleHelper::getLayoutPath( 'mod_wolfslider' ) );

?>
