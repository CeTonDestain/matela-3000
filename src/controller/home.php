<?php
class HomeController
{
    public function __construct(HomeModel $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        $query=$this->model->db->query("SELECT * FROM catalogue");
        $data=$query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
