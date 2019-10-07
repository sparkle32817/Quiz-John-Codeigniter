<?php


class Data_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getQuizPairs()
    {
        return $this->db->select('a.category_id as first_id, a.item_name as first, b.category_id as second_id, b.item_name as second')
                    ->from('tbl_item a')
                    ->join('tbl_item b', 'a.category_id != b.category_id')
                    ->get()->result_array();
    }

    public function getItems()
    {
        return$this->db->get('tbl_item')->result_array();
    }

    public function getCategories()
    {
        return $this->db->get('tbl_category')->result_array();
    }
}