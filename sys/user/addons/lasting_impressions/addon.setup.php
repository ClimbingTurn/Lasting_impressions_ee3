<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package     lasting_impressions
 * @author      Dorothy Molloy / Anthony Mellor
 * @link 		https://www.climbingturn.co.uk/software/ee-add-ons/lasting-impressions-for-eecms-v3
 * @copyright 	Copyright (c) 2021, Climbing Turn Ltd
 *
 *  This file is part of lasting_impressions.
 *	Requires ExpressionEngine 3.0.0 or above
 *  ExpressionEngine 6 compliant
 */


 //  Make sure that the version number is updated in config.php
use ClimbingTurn\LastingImpressions\libraries\Config as LiConfig;
require_once __DIR__ . '/libraries/Config.php';

return array(
    'author'      => 'Climbing Turn',
    'author_url'  => 'https://www.climbingturn.co.uk',
    'name'        => 'Lasting Impressions',
    'description' => 'Record the entries viewed by each visitor to your site so that you can show the visitor what they last viewed.',
    'version'     => LiConfig::getConfig()['version'],
    'namespace'   => 'ClimbingTurn\LastingImpressions',
    'docs_url'    => 'https://www.climbingturn.co.uk/software/documentation/lasting-impressions-for-eecms',
    'settings_exist' => TRUE,
    'models' => array(
         'Settings' => 'Model\Settings',
         'Data' => 'Model\Data'
    ),
    'consent.requests' => [
        'cache_views' => [
            'title' => 'Your recently viewed items',
            'request' => 
            'We will anonymously save the ID of each item and the date viewed in a cookie so that you can keep track of the things you are interested in',
            'request_format' => 'json'
        ]
        ],
    'cookies.necessary' => [
        'unique_id',
    ] 

);

