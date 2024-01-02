<?php
require_once 'Report.php';

class ReportDAO
{
    private $conn;
    private Report $report;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->report = new Report();
    }

    /**
     * Get the value of report
     */ 
    public function getReport()
    {
        return $this->report;
    }
}