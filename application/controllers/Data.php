<?php


class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_model');
        $this->load->library('session');
    }

    public function getQuizPairs()
    {
        $results = $this->Data_model->getQuizPairs();

        $returnVal = array();
        foreach ($results as $result)
        {
            $flag = false;
            foreach ($returnVal as $res)
            {
                if (array_diff($result, $res) === array())
                {
                    $flag = true;
                    break;
                }
            }

            if ( !$flag )
            {
                array_push($returnVal, $result);
            }
        }

        shuffle($returnVal);
        shuffle($returnVal);
        shuffle($returnVal);

        echo json_encode($returnVal);
    }

    public function getImages()
    {
        $results = $this->Data_model->getItems();

        $returnVal = array();
        foreach ($results as $result)
        {
            $images = array();

            $target = "./images/" . $result['category_id'] . "/" . str_replace('/', '---', trim($result['item_name'])) . "/";

            foreach ( scandir($target) as $file )
            {
                if ($file=="." || $file=="..")
                {
                    continue;
                }

                array_push($images, $target.$file);
            }

            shuffle($images);

            $returnVal[$result['category_id']][$result['item_name']] = $images;
        }

        echo json_encode($returnVal);
    }

    public function raiseCount()
    {
        $categoryCount = json_decode($this->session->userdata('categoryCount'));

        $categoryCount[$this->input->post('arr_index')]++;

        $this->session->set_userdata('index', $this->input->post('cur_index'));
        $this->session->set_userdata('categoryCount', json_encode($categoryCount));

        echo "success";
    }

    public function getCategories()
    {
        $categoryCount = json_decode($this->session->userdata('categoryCount'));
        $analytics = array();

        $categories = $this->Data_model ->getCategories();
        foreach ($categories as $category)
        {
            $analytic = array();
            $analytic["category"] = $category['title'];
            $analytic["count"] = $categoryCount[$category['id']-1];

            array_push($analytics, $analytic);
        }

        echo json_encode($analytics);
    }
}
