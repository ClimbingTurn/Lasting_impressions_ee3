<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package     lasting_impressions
 * @author      Dorothy Molloy / Anthony Mellor
 * @link 		https://www.climbingturn.co.uk/software/ee-add-ons/lasting-impressions-for-eecms-v3
 * @copyright 	Copyright (c) 2019, Climbing Turn Ltd
 *
 *  This file is part of lasting_impressions.
 *	Requires ExpressionEngine 3.0.0 or above
 *  ExpressionEngine 4 compliant
 */


return array(
    'author'      => 'Climbing Turn',
    'author_url'  => 'http://www.climbingturn.co.uk',
    'name'        => 'Lasting Impressions',
    'description' => 'Record the entries viewed by each visitor to your site so that you can show the visitor what they last viewed.',
    'version'     => '4.0.2',
    'namespace'   => 'ClimbingTurn\LastingImpressions',
    'docs_url'    => 'https://www.climbingturn.co.uk/software/documentation/lasting-impressions-for-eecms',
    'settings_exist' => TRUE,
    'models' => array(
         'Settings' => 'Model\Settings',
         'Data' => 'Model\Data'
    ) 

);

