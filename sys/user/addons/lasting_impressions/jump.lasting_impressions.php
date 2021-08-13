<?php 

use ExpressionEngine\Service\JumpMenu\AbstractJumpMenu;

/**
 * Lasting Impression Control Panel class
 *
 * @package     lasting_impressions
 * @author      Dorothy Molloy 
 * @link 		    http://www.climbingturn.co.uk/software/ee-add-ons/lasting-impressions
 * @copyright 	Copyright (c) 2021, Climbing Turn Ltd
 * 
 * This file is part of lasting_impressions.
 *	Requires ExpressionEngine 6.0.0 or above
 */
class Lasting_impressions_jump extends AbstractJumpMenu 
{

   protected static $items = array(
         'settings' => array(
            'icon' => 'fa-wrench',
            'command' => 'lasting impressions settings',
            'command_title' => 'View <b>settings</b>',
            'dynamic' => false,
            'requires_keyword' => false,
            'target' => ''
            ),      
		   'totals' => array(
            'icon' => 'fa-eye',
            'command' => 'entry totals report',
            'command_title' => 'View <b>entry totals</b> report',
            'dynamic' => false,
            'requires_keyword' => false,
            'target' => '&method=groupby_report'
            ),
		   'reports' => array(
            'icon' => 'fa-eye',
            'command' => 'all data report',
            'command_title' => 'View <b>all data</b> report',
            'dynamic' => false,
            'requires_keyword' => false,
            'target' => 'report_all'
            )       

   );

}