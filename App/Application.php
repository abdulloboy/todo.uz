<?php

namespace App;

class Application
{
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run()
    {
        session_start();
        $database = new Database($this->config);
        $database->new_connection();
        $this->install($database->db());
        require_once('Routes.php');
    }

    public function install($db)
    {
        //Table creation
        $sql = "CREATE TABLE IF NOT EXISTS `Tasks`
            (id INTEGER PRIMARY KEY,
            username VARCHAR(250) NOT NULL,
            email VARCHAR(250) NOT NULL,
            text TEXT NOT NULL,
            status INTEGER NULL DEFAULT '0',
            edited INTEGER NULL DEFAULT '0'
            )";

        $db->exec($sql);
    }
}
