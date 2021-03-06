<?php
#  Copyright 2003-2015 Opmantek Limited (www.opmantek.com)
#
#  ALL CODE MODIFICATIONS MUST BE SENT TO CODE@OPMANTEK.COM
#
#  This file is part of Open-AudIT.
#
#  Open-AudIT is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published
#  by the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  Open-AudIT is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with Open-AudIT (most likely in a file named LICENSE).
#  If not, see <http://www.gnu.org/licenses/>
#
#  For further information on Open-AudIT or for a license other than AGPL please see
#  www.opmantek.com or email contact@opmantek.com
#
# *****************************************************************************

/**
* @category  Model
* @package   Open-AudIT
* @author    Mark Unwin <marku@opmantek.com>
* @copyright 2014 Opmantek
* @license   http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
* @version   2.1.1
* @link      http://www.open-audit.org
 */
class M_summaries extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->log = new stdClass();
        $this->log->status = 'reading data';
        $this->log->type = 'system';
    }

    public function read($id = '')
    {
        if (empty($this->log)) {
            $this->log = new stdClass();
        }
        $this->log->function = strtolower(__METHOD__);
        stdlog($this->log);
        if ($id == '') {
            $CI = & get_instance();
            $id = intval($CI->response->meta->id);
        } else {
            $id = intval($id);
        }
        $sql = "SELECT * FROM summaries WHERE id = ?";
        $data = array($id);
        $result = $this->run_sql($sql, $data);
        $result = $this->format_data($result, 'summaries');
        return ($result);
    }

    public function delete($id = '')
    {
        $this->log->function = strtolower(__METHOD__);
        $this->log->status = 'deleting data';
        stdlog($this->log);
        if ($id == '') {
            $CI = & get_instance();
            $id = intval($CI->response->meta->id);
        } else {
            $id = intval($id);
        }
        if ($id != 0) {
            $CI = & get_instance();
            $sql = "DELETE FROM `summaries` WHERE id = ?";
            $data = array(intval($id));
            $this->run_sql($sql, $data);
            return true;
        } else {
            return false;
        }
    }

    public function collection()
    {
        if (empty($this->log)) {
            $this->log = new stdClass();
        }
        $this->log->function = strtolower(__METHOD__);
        stdlog($this->log);
        $CI = & get_instance();
        if (empty($CI->response->meta->sort)) {
            $CI->response->meta->sort = 'name';
        }
        $sql = $this->collection_sql('summaries', 'sql');
        $result = $this->run_sql($sql, array());
        $result = $this->format_data($result, 'summaries');
        $tables = ' field audit_log bios change_log credential disk dns edit_log file ip log memory module monitor motherboard netstat network nmap optical partition pagefile print_queue processor purchase route san scsi service server server_item share software software_key sound task user user_group variable video vm windows ';
        for ($i=0; $i < count($result); $i++) {
            if ($result[$i]->attributes->table == 'orgs') {
                $org_id = 'id';
            } else {
                $org_id = 'org_id';
            }
            if (stripos($tables, $result[$i]->attributes->table) !== false) {
                $sql = "SELECT COUNT(DISTINCT " . $result[$i]->attributes->table . "." . $result[$i]->attributes->column . ") AS `count` FROM system LEFT JOIN " . $result[$i]->attributes->table . " ON (system.id = " . $result[$i]->attributes->table . ".system_id and " . $result[$i]->attributes->table . ".current = 'y') WHERE system.org_id IN (" . $CI->user->org_list . ")";
            } else {
                $sql = "SELECT COUNT(DISTINCT " . $result[$i]->attributes->column . ") AS `count` FROM " . $result[$i]->attributes->table . " WHERE `" . $org_id . "` IN (" . $CI->user->org_list . ")";
                #$sql = "SELECT COUNT(DISTINCT " . $result[$i]->attributes->column . ") AS `count` FROM " . $result[$i]->attributes->table . " WHERE `" . $org_id . "` IN (" . $CI->user->org_list . ") WHERE " . $result[$i]->attributes->table . "." . $result[$i]->attributes->column . " IS NOT NULL AND " . $result[$i]->attributes->table . "." . $result[$i]->attributes->column . " != ''";
            }
            $count = $this->run_sql($sql, array());
            if (!empty($count[0]->count)) {
                $result[$i]->attributes->count = intval($count[0]->count);
            } else {
                $result[$i]->attributes->count = 0;
            }
            $result[$i]->attributes->link_execute = $result[$i]->links->self . '?action=execute&format=json&debug=true';
        }
        unset($this->log);
        return ($result);
    }

    public function execute($id = '')
    {
        $this->log->function = strtolower(__METHOD__);
        stdlog($this->log);
        if ($id == '') {
            $CI = & get_instance();
            $id = intval($CI->response->meta->id);
            $set_count = true;
            $limit = str_replace('LIMIT ', '', $CI->response->meta->internal->limit);
            $limit = explode(',', $limit);
            if (!empty($limit[0])) {
                $limit_lower = @intval($limit[0]);
            } else {
                $limit_lower = 0;
            }
            if (!empty($limit[1])) {
                $limit_upper = intval($limit[1]);
            } else {
                $limit_upper = 8888888888;
            }
            
            unset($limit);
        } else {
            $id = intval($id);
            $limit_lower = 0;
            $limit_upper = 8888888888;
        }
        $sql = "SELECT * FROM summaries WHERE id = ?";
        $data = array($id);
        $dashboard = $this->run_sql($sql, $data);

        if (!empty($CI)) {
            $CI->response->meta->title = 'Summaries - ' . $dashboard[0]->name;
        }

        if ($dashboard[0]->table == 'orgs') {
            $org_id = 'id';
        } else {
            $org_id = 'org_id';
        }
        $tables = ' field audit_log bios change_log credential disk dns edit_log file ip log memory module monitor motherboard netstat network nmap optical partition pagefile print_queue processor purchase route san scsi service server server_item share software software_key sound task user user_group variable video vm windows ';
        $filter = '';
        if (!empty($CI->response->meta->filter)) {
            foreach ($CI->response->meta->filter as $filter_entry) {
                $filter .= ' AND ' . $filter_entry->name . ' ' . $filter_entry->operator . ' ' . '"' . $filter_entry->value . '"';
            }
        }
        if (stripos($tables, $dashboard[0]->table) !== false) {
            $sql = "SELECT " . $dashboard[0]->id . " AS `id`, COUNT(*) AS `count`, " . $dashboard[0]->table . "." . $dashboard[0]->column . " AS `name` FROM system LEFT JOIN `" . $dashboard[0]->table . "` ON (system.id = " . $dashboard[0]->table . ".system_id and " . $dashboard[0]->table . ".current = 'y') WHERE " . $dashboard[0]->table . "." . $dashboard[0]->column . " IS NOT NULL AND " . $dashboard[0]->table . "." . $dashboard[0]->column . " != '' AND system.org_id IN (" . $CI->user->org_list . ")" . $filter . " GROUP BY " . $dashboard[0]->table . "." . $dashboard[0]->column;
        
        } else {
            $sql = "SELECT " . $dashboard[0]->id . " AS `id`, COUNT(*) AS `count`, " . $dashboard[0]->column . " AS `name` FROM `" . $dashboard[0]->table . "` WHERE `$org_id` IN (" . $CI->user->org_list . ")" . $filter . " GROUP BY `" . $dashboard[0]->column . "`";
        }
        $result = $this->run_sql($sql, array());
        $result = $this->format_data($result, 'summaries');
        switch ($dashboard[0]->table) {

            case 'networks':
                $collection = 'networks';
                break;

            case 'orgs':
                $collection = 'orgs';
                break;

            case 'system':
                $collection = 'devices';
                break;
            
            default:
                $collection = 'devices';
                break;
        }
        if (!empty($dashboard[0]->extra_columns)) {
            $properties = 'system.id,system.icon,system.type,system.name,system.domain,system.ip,system.os_family,system.status,' . $dashboard[0]->extra_columns;
        } else {
            $properties = 'system.id,system.icon,system.type,system.name,system.domain,system.ip,system.os_family,system.status';
        }
        $link = $CI->config->config['base_url'] . 'index.php/' . $collection . '?' . $dashboard[0]->table . '.' . $dashboard[0]->column . '=';
        for ($i=0; $i < count($result); $i++) {
            $result[$i]->attributes->link = $link . urlencode($result[$i]->attributes->name) . '&properties=' . $properties;
        }
        if (!empty($set_count)) {
            if ($limit_upper == 8888888888) {
                $CI->response->meta->filtered = count($result);
            }
            $CI->response->meta->total = count($result);
        }
        if ($limit_upper != 8888888888) {
            $result = array_slice($result, $limit_lower, $limit_upper);
            if (!empty($set_count)) {
                $CI->response->meta->filtered = count($result);
            }
        }
        if (empty($result)) {
            $result = array();
            $item = new stdClass();
            $item->id = 0;
            $item->type = 'summaries';
            $item->attributes = new stdClass();
            $item->attributes->id = 0;
            $item->attributes->count = 0;
            $item->attributes->name = '';
            $item->attributes->link = '';
            $result[] = $item;
            unset($item);
        }
        return ($result);
    }

    public function read_sub_resource()
    {
        $this->log->function = strtolower(__METHOD__);
        stdlog($this->log);
        $this->load->model('m_users');
        $data = array();

        $collections = array('attributes' => 'th-list', 'configuration' => 'cogs', 'connections' => 'link', 'credentials' => 'shield', 'database' => 'database', 'devices' => 'tv', 'discoveries' => 'binoculars', 'fields' => 'list', 'groups' => 'tags', 'ldap_servers' => 'key', 'licenses' => 'leanpub', 'locations' => 'globe', 'logs' => 'bars', 'networks' => 'wifi', 'orgs' => 'bank', 'queries' => 'table', 'scripts' => 'code', 'summaries' => 'file-image-o', 'users' => 'users');

        foreach ($collections as $collection => $value) {
            if ($this->m_users->get_user_permission('', $collection, 'r')) {
                if ($collection == 'database') {
                    $count = count($this->db->list_tables());
                } else if ($collection == 'logs') {
                    $count = 2;
                } else if ($collection == 'devices') {
                    $sql = "SELECT COUNT(*) AS `count` FROM `system`";
                    $count = $this->run_sql($sql);
                    $count = intval($count[0]->count);
                } else if ($this->db->table_exists($collection)) {
                    $sql = "SELECT COUNT(*) AS `count` FROM `" . $collection . "`";
                    $count = $this->run_sql($sql);
                    $count = intval($count[0]->count);
                } else {
                    $count = '';
                }
                $item = new stdClass();
                $item->type = 'collection';
                $item->attributes = new stdClass();
                $item->attributes->name = ucwords(str_replace('_', ' ', $collection));
                $item->attributes->collection = $collection;
                $item->attributes->icon = $value;
                $item->attributes->count = $count;
                $data[] = $item;
                unset($item);
            }
        }

        return $data;
    }
}
