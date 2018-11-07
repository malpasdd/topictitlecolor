<?php
/**
 *
 * Subject Color. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, David Colón, https://www.davidiq.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace davidiq\topictitlecolor\migrations;

class initial_schema extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'topic_title_colors');
	}

        public function update_data()
	{
                return array(
                        // Add user permissions
                        array('permission.add', array('f_topictitlecolor_use', false)),
                        // Set permissions
                        array('permission.permission_set', array('ROLE_ADMIN_FULL', 'f_topictitlecolor_use')),
                );
        }
        
	public function update_schema()
	{
		return array(
			'add_tables'		=> array(
				$this->table_prefix . 'topic_title_colors'	=> array(
					'COLUMNS'		=> array(
						'topic_id'			=> array('UINT', 0),
						'title_color'		=> array('VCHAR:6', ''),
					),
					'PRIMARY_KEY'	=> 'topic_id',
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables'		=> array(
				$this->table_prefix . 'topic_title_colors',
			),
		);
	}
}
