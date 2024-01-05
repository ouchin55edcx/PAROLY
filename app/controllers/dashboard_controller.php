<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Dashboard extends Controller
{
    public function index(...$param)
    {
        $user = new UserDAO();
        $playlistDAO = new PlaylistDAO();
        $music = new MusicDAO();
        $genreDAO = new GenreDAO();
        $lyricsDAO = new LyricsDAO();
        $reportDAO = new ReportDAO();
        $PlaylistMusicDAO = new PlaylistMusicDAO();

        $reports = $reportDAO->getReport();
        $playlists = $playlistDAO->getPlaylists();
        $lyrics = $lyricsDAO->getLyrics();
        $genres = $genreDAO->getGenres();
        $users = $user->getUserInfo();
        $artistCount = $user->artistCount();
        $musics = $music->getMusic();
        $countSong = $music->getSongCount();

        if (isset($_POST['AddPlaylist'])) {
            $newPlaylist = new Playlist();
            $newPlaylist->getUser()->setId($_POST['userId']);
            $newPlaylist->setName($_POST['playlistName']);
            $newPlaylist->setDesc($_POST['playlistDesc']);

            $result = $playlistDAO->addPlaylist($newPlaylist);
            if ($result) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }
        if (isset($_POST['AddPGenre'])) {
            $newGenre = new Genre();
            $newGenre->setName($_POST['genreName']);
            $result = $genreDAO->addGenre($newGenre);
            if ($result) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }
        if (isset($_POST['approve'])) {
            $newLyrics = new Lyrics();
            $newLyrics->setId($_POST['approve']);
            $lyricsDAO->verifier($newLyrics);
            $mail = new PHPMailer();
            try {

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->SMTPDebug = 2;

                $mail->isSMTP();

                $mail->SMTPAuth = true;

                $mail->Host = "smtp.gmail.com";

                $mail->Username = "youcodecodex@gmail.com";
                $mail->Password = "fagkcsrlveeijxap";

                $mail->SMTPSecure = 'tls';
                $mail->Port = 25;


                $mail->setFrom("youcodecodex@gmail.com", 'paroly');
                $mail->addAddress($_POST['email'], $_POST['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Here is the subject';
                $mail->Body = '3la salama <b><i>approved</i></b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
            catch (Exception $e) {
            }
        }
        if (isset($_POST['deleteLyrics'])) {
            $newLyrics = new Lyrics();
            $newLyrics->setId($_POST['deleteLyrics']);
            $lyricsDAO->deleteLyrics($newLyrics);
        }

        if (isset($_POST['addToPlaylist'])) {



            $newPlaylistMusic = new PlaylistMusic();
            $newPlaylistMusic->getPlaylist()->setId($_POST['playlistId']);
            $newPlaylistMusic->getMusic()->setId($_POST['idSong']);
            $result = $PlaylistMusicDAO->addMusicToPlaylist($newPlaylistMusic);
            if ($result) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }
        $this->view('dashboard', ['user' => $users, 'playlists' => $playlists, 'musics' => $musics, 'genres' => $genres , 'lyrics' => $lyrics , 'count' =>$countSong , 'artistCount' =>$artistCount , 'reports' => $reports] );
    }
}

