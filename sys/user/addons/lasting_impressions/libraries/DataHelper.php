<?php
namespace ClimbingTurn\LastingImpressions\Libraries;

// use EllisLab\ExpressionEngine\Library\CP\Table;
use ExpressionEngine\Library\CP\Table;
use ClimbingTurn\LastingImpressions\libraries\Config as LiConfig;

/**
 * Lasting Impressions DataHelper class
 *
 * @package     lasting_impressions
 * @author      Dorothy Molloy / Anthony Mellor
 * @link        https://www.climbingturn.co.uk/software/ee-add-ons/lasting-impressions-for-eecms-v3
 * @copyright   Copyright (c) 2019, Climbing Turn Ltd
 *
 *  This file is part of lasting_impressions.
 *  Requires ExpressionEngine 3.0.0 or above
 */
class DataHelper {
    
    
public function get_all_recorded_data($group_by, $limit = 0) {
          $query = $this->_get_lasting_impressions_data($group_by, $limit);
          if ($query->num_rows() > 0){
	        $data= $query->result_array();
                return $data;
          }
          return array();
  }


  /**
   * Get statistics on what entries have been viewed from the Lasting Impressions DB
   *
   * @param bool $group_by true if you want to group the output by number of views
   * @param int $limit
   * @return array
   */
  private function _get_lasting_impressions_data($group_by, $limit = 0){
	$res = "";
	if ($group_by) {
		$sql = "select * FROM (
			SELECT count(*) as num_views, d.entry_id as entry_id, t.title, t.site_id, t.channel_id " .
			"FROM exp_lasting_impressions_data d " .
			"inner join exp_channel_titles t " .
			"on d.entry_id = t.entry_id " .
			"group by d.entry_id
			) as tmp_table order by tmp_table.num_views desc";
		if ($limit > 0) {
			$sql .= " limit " . $limit;
		}
		$res = ee()->db->query($sql);
	} else {
	ee()->db->select("d.entry_id, t.title,  t.site_id, t.channel_id, d.member_id, d.session_id, d.ip_address, d.user_agent, d.entry_date")
			->from(LiConfig::getConfig()['data_table']  . ' d')
			->join('channel_titles t', 'd.entry_id = t.entry_id', 'inner')
			->order_by('d.entry_id');                   
			$res = ee()->db->get();
	}
	return $res;
}

  
//   private function _get_lasting_impressions_data($group_by){
//       if ($group_by) {
//           ee()->db->select("count(*) as num_views, d.entry_id, t.title, t.site_id, t.channel_id")
//               ->from(LiConfig::getConfig()['data_table']  . ' d')
//               ->join('channel_titles t', 'd.entry_id = t.entry_id', 'inner') 
//               ->group_by('d.entry_id')
//               ->order_by('num_views', 'DESC');
//       } else {
//       ee()->db->select("d.entry_id, t.title,  t.site_id, t.channel_id, d.member_id, d.session_id, d.ip_address, d.user_agent, d.entry_date")
//               ->from(LiConfig::getConfig()['data_table']  . ' d')
//               ->join('channel_titles t', 'd.entry_id = t.entry_id', 'inner')
//               ->order_by('d.entry_id');                   
//       }
//       $res = ee()->db->get();
//       return $res;
//   }
  
  
  
  public function purge_all_recorded_data() {
        ee()->db->empty_table(LiConfig::getConfig()['data_table'] );
  }
  
  //------------------------ TABLES ----------------------------- //
  
  public function create_simple_table($limit=25, $current_page = 1){
        $table = ee('CP/Table', array( 'sortable' => 'FALSE', 'autosort' => 'TRUE',  'limit' => $limit, 'page' => $current_page));
        $table->setColumns(
                array(
                   'entry_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'title' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'site_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'channel_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'member_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'session_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'ip_address' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'user_agent' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                   'entry_date' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   )
                 )
            );
        $table->setNoResultsText('no_data');
        $stats = $this->get_all_recorded_data(false);
        $stats = $this->_format_date_field($stats);
        $table->setData($stats);
        return $table;
        
  }
  
public function create_totals_table( $limit=25, $current_page) {
    $table = ee('CP/Table', array( 'sortable' => 'TRUE',  'limit' => $limit, 'page' => $current_page));
    $table->setColumns(
        array(
               'num_views' => array(
                           'label' => 'Num Views',
                           'sort' => 'true',
                           'type' => 'Table::COL_TEXT'
                   ),
                'entry_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                'title' => array(
                           'sort' => 'true',
                           'type' => 'Table::COL_TEXT'
                   ),
                'site_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   ),
                'channel_id' => array(
                           'sort' => 'false',
                           'type' => 'Table::COL_TEXT'
                   )
            )
        );
    $table->setNoResultsText('no_data');
    $stats = $this->get_all_recorded_data(true);
    $table->setData($stats);
    return $table;
    }
    
    private function _format_date_field($stats_array){
        foreach($stats_array as &$item) {
            $formatted_date =  date('d-m-Y', $item['entry_date']);
            $item['entry_date'] = $formatted_date;
        }
        return $stats_array;
    }
}
