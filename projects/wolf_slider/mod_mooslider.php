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
 *@copyright (C) 2008 LaunchTulsa.com
 *@link http://launchtulsa.com Official website
**/

// no direct access
defined( "_JEXEC" ) or die( "Restricted access" );

$mooslider_wrap_width	= $params->get( "mooslider_wrap_width", "600px");
$mooslider_width		= $params->get( "mooslider_width", "550px");
$mooslider_sliderwidth	= $params->get( "mooslider_sliderwidth", "550");
$mooslider_height		= $params->get( "mooslider_height", "200px");
$mooslider_effect		= $params->get( "mooslider_effect", "horizontal");
$mooslider_mootools		= $params->get( "mooslider_mootools", 1) ;
$mooslider_pos1			= $params->get( "mooslider_pos1", "user1"); // Module to use in the 1st slide
$mooslider_pos2			= $params->get( "mooslider_pos2", "user2"); // Module to use in the 1st slide
$mooslider_pos3			= $params->get( "mooslider_pos3", "user3"); // Module to use in the 1st slide
$mooslider_pos4			= $params->get( "mooslider_pos4", "user4"); // Module to use in the 1st slide
$mooslider_pos5			= $params->get( "mooslider_pos5", "user5"); // Module to use in the 1st slide
$mooslider_pos6			= $params->get( "mooslider_pos6", "user6"); // Module to use in the 1st slide
$mooslider_autoplay		= $params->get( "mooslider_autoplay", "autoPlay: true") ;
$mooslider_speed		= $params->get( "mooslider_speed", "6000");
$mooslider_link			= $params->get( "mooslider_link", 1);

// The fade effect is a separate parameter to the JavaScript function, but makes more sense
// from the user's perspective if it's combined with the horizontal vs. vertical sliding.
// To accommodate the user, we split it into a separate variable here.
$mooslider_fade = (0 === strcasecmp($mooslider_effect, 'fade')) ? 'true' : 'false';

require( JModuleHelper::getLayoutPath( "mod_mooslider" ) );

?>