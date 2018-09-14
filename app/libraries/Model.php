<?php
namespace Fastbreak\libraries;

class Model
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::instance();
    }

    protected function areAllFieldsFilled($data)
    {
        $filteredData = array_filter($data);
        return $filteredData == $data;
    }

}

?>