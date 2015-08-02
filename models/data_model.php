<?php

class data_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_event_list($criteria,$sEcho)
    {
        $category_str = array("UT", "Controller", "AP", "Security", "CoverageHole", "Interference", "STB");
        $severity_str = array("EMERG", "ALERT", "CRIT", "ERROR", "WARN", "NOTICE", "INFO", "DEBUG");
        $sTable = 'data_table';
        $aColumns = array('id', 'name', 'sex', 'birthday', 'level', 'class', 'address');

        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $query = $this->db->get($sTable);
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
        $iTotal = $this->db->count_all($sTable);
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );     

        $i=0;
        foreach($query->result_array() as $data)
        {
            $row = array();
            $row[0] = $data['id'];
            $row[1] = $data['name'];
            $row[2] = $data['sex'];
            $row[3] = $severity_str[$data['birthday']];
            $row[4] = $data['level'];     
            $row[5] = $category_str[$data['class']];
            $row[6] = $data['address'];

            $output['aaData'][$i] = $row;
            
            $i++;
        }
        return $output;
    }

}
