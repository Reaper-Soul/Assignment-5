<?php

  class Report{

    public function __construct() {

    }

    public function getAllReminders(){
      $db = db_connect();
      $query = $db->prepare("SELECT * FROM notes WHERE is_deleted = 0;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRemindersCount(){
      $db = db_connect();
      $query = $db->prepare("SELECT COUNT(*) as count FROM notes WHERE is_deleted = 0;");
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result['count'];
    }

    public function getRecentActivity($days) {
        $db = db_connect();

        $query = $db->prepare("
            SELECT DATE(created_at) as date, COUNT(*) as count
            FROM notes
            WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL :days DAY)
            GROUP BY DATE(created_at)
            ORDER BY DATE(created_at) ASC
        ");

        $query->execute(['days' => $days]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $map = [];
        foreach ($results as $row) {
            $map[$row['date']] = (int) $row['count'];
        }

        $counts = [];
        $today = new DateTime();
        for ($i = $days - 1; $i >= 0; $i--) {
            $day = $today->modify("-$i day")->format('Y-m-d');
            $counts[] = $map[$day] ?? 0;
            $today = new DateTime();
        }
        return $counts;
    }

    public function getUserWithMostReminders(){
      $db = db_connect();
      $query = $db->prepare("SELECT user, COUNT(*) as reminder_count FROM notes WHERE is_deleted = 0 GROUP BY user ORDER BY reminder_count DESC LIMIT 1;");
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result['user'];
    }
    
    
  }