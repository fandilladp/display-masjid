<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function insert_update_batch( $table, $data )
    {
        $count      = 0;
        $jumlah     = 0;

        foreach ($data as $param) {
            $result     = $this->_insert_update($table, $param);
            if ($result == TRUE){
                $count++;
            }
            $jumlah++;
        }

        if ( $count == $jumlah )
        {
            $result             = [];
            $result['status']   = TRUE;
            $result['jumlah']   = $jumlah;
        }
            else
        {
            $result             = [];
            $result['status']   = FALSE;
            $result['jumlah']   = $jumlah;
            $result['message']  = ($jumlah - $count) . ' data gagal diproses';
        }

        return $result;
    }

    public function insert_update( $table, $data, $return = false )
    {
        $result     = $this->_insert_update($table, $data);

        if ( $return ) {
            $getdata    = $this->m_general->get_data('row', $table, '*', ['where' => $data] );
        }        

        if ( $result == TRUE )
        {
            $result             = [];
            $result['id']       = $this->db->insert_id();            
            $result['status']   = TRUE;
            if ( $return ) {
                $result['data']     = $getdata;
            }
        }
            else
        {
            $result             = [];
            $result['status']   = FALSE;
        }

        return $result;
    }

    public function insert_batch( $table, $data = NULL )
    {
        $result    = $this->db->insert_batch( $table, $data );

        if ( $result == TRUE )
        {
            $result             = [];
            $result['status']   = TRUE;
        }
            else
        {
            $result             = [];
            $result['status']   = FALSE;
        }

        return $result;
    }

    public function insert( $table, $data = NULL )
    {
        $result    = $this->db->insert( $table, $data );

        if ( $result == TRUE )
        {
            $result             = [];
            $result['status']   = TRUE;
            $result['id']       = $this->db->insert_id();
        }
            else
        {
            $result             = [];
            $result['status']   = FALSE;
        }

        return $result;
    }

    public function update( $table, $data = NULL, $where = NULL, $where_custom = NULL )
    {
        ( ! is_null($where_custom)
            ? $this->db->where($where_custom, NULL, FALSE)
            : ''
        );

        $result    = $this->db->update( $table, $data, $where );
        
        if ( $result == TRUE ) {
            $result = [];
            $result['status'] = TRUE;
        } else {
            $result = [];
            $result['status'] = FALSE;
        }

        return $result;
    }

    public function update_advanced($table, $data, $where) {

        if ( !is_null($where) )
        {
            if ( count(@$where['or']) > 0 )         $this->db->or_where($where['or']);
            if ( count(@$where['where']) > 0 )      $this->db->where($where['where']);
            if ( count(@$where['in']) > 0 )         $this->db->where_in($where['in']['field'], $where['in']['data']);
            if ( count(@$where['notin']) > 0 )      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
            if ( count(@$where['custom']) > 0 )     $this->db->where($where['custom'], null, FALSE);
        }

        $result    = $this->db->update( $table, $data );

        return $result;
    }

    public function delete( $table, $where = NULL )
    {
        $this->db->reset_query();

        if ( !is_null($where) )
        {
            if ( count(@$where['or']) > 0 )         $this->db->or_where($where['or']);
            if ( count(@$where['where']) > 0 )      $this->db->where($where['where']);
            if ( count(@$where['in']) > 0 )         $this->db->where_in($where['in']['field'], $where['in']['data']);
            if ( count(@$where['notin']) > 0 )      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
            if ( count(@$where['custom']) > 0 )     $this->db->where($where['custom'], null, FALSE);            
        }

        $result    = $this->db->delete( $table );

        return $result;
    }

    public function getdata($tipe = 'object', $from = "", $select = "*", $where = null, $order = null, $offset = 0, $limit = 0, $join = null, $group = null)
    {
        $this->db->select($select, FALSE)->from($from);

        if ( !is_null($join) )
        {
            if ( count( $join ) > 0 ) :
                foreach($join as $valjoin) :
                    $valtype    = ( @$valjoin['type'] == '' ) ? 'INNER' : $valjoin['type'];
                    $this->db->join( $valjoin['table'], $valjoin['on'], $valtype );
                endforeach;
            endif;
        }

        if ( !is_null($group) )
        {
            $this->db->group_by($group);
        }

        if ( !is_null($where) )
        {
            if ( count(@$where['or']) > 0 )         $this->db->or_where($where['or']);
            if ( count(@$where['where']) > 0 )      $this->db->where($where['where']);
            if ( count(@$where['in']) > 0 )         $this->db->where_in($where['in']['field'], $where['in']['data']);
            if ( count(@$where['notin']) > 0 )      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
            if ( count(@$where['custom']) > 0 )     $this->db->where($where['custom'], null, FALSE);
        }

        if ( !is_null($order) )
        {
            foreach ($order as $myorder) {
                $dir    = ( @$myorder['direction'] != "" ) ? $myorder['direction'] : 'asc';
                $this->db->order_by($myorder['field'], $dir);
            }
        }

        if ($limit != 0)
        {
            $this->db->limit($limit, $offset);
        }

        $query  = $this->db->get();

        if ( $tipe == 'array' ) $result = $query->result_array();
        else if ($tipe == 'row') $result = $query->row();
        else $result = $query->result();

        return $result;
    }

    public function count_data($tabel = "", $where = null, $join = null)
    {
        $this->db->select('count(*) as jml')->from($tabel);

        if ( !is_null($join) )
        {
            if ( count( $join ) > 0 ) :
                foreach($join as $valjoin) :
                    $valtype    = ( @$valjoin['type'] == '' ) ? 'INNER' : $valjoin['type'];
                    $this->db->join( $valjoin['table'], $valjoin['on'], $valtype );
                endforeach;
            endif;
        }

        if ( !is_null($where) )
        {
            if ( count(@$where['or']) > 0 )     $this->db->or_where($where['or']);
            if ( count(@$where['where']) > 0 )  $this->db->where($where['where']);
            if ( count(@$where['custom']) > 0 )  $this->db->where($where['custom'], null, FALSE);
        }

        $query  = $this->db->get();

        $row    = $query->row();
        return $row->jml;
    }

    public function _insert_update($table, $data)
    {
        $key    = [];
        $value  = [];

        $strDuplicate   = [];
        foreach ($data as $kolom => $nilai) {
            $key[]              = $kolom;
            $value[]            = $nilai;

            $nilai              = $this->db->escape($nilai);
            $strDuplicate[]     = "{$kolom} = {$nilai}";
        }
        $strDuplicate   = implode(",", $strDuplicate);

        $tanya  = [];
        foreach ($value as $val)
        {
            $tanya[] = '?';
        }
        $tanya  = implode(", ", $tanya);

        $sKey   = implode(",", $key);

        $sql    = " INSERT INTO {$table}({$sKey}) VALUES ({$tanya})
                    ON DUPLICATE KEY UPDATE
                    {$strDuplicate}
                  ;";
        $query  = $this->db->query($sql, $value);

        return $query;
    }

}