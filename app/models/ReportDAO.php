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
        $query = "SELECT * FROM reports, lyrics WHERE reports.lyricsId = lyrics.lyricsId AND isResolved = 0";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $reports = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $report = new Report();

            $report->getLyrics()->setContent($row['lyricsContent']);

            $report->setId($row['reportId']);
            $report->setDesc($row['reportDesc']);
            array_push($reports, $report);
        }
        return $reports;
    }
}
