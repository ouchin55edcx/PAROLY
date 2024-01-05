<?php
//    public function getLyrics()
//    {
//        $query = "SELECT * FROM lyrics, music, users WHERE lyrics.userId = users.userId AND lyrics.musicId = music.musicId;";
//        $result = $this->conn->query($query);
//
//        $lyrics = array();
//        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//            $newLyrics = new Lyrics();
//            $newLyrics->setId($row['lyricsId']);
//            $newLyrics->setContent($row['lyricsContent']);
//            $newLyrics->setIsVerified($row['isVerified']);
//            $lyrics[] = $newLyrics;
//        }
//
//        return $lyrics;
//    }

