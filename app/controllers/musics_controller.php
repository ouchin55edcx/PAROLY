<?php
class Musics extends Controller
{

    public function index(...$param)
    {
        $musicDAO = new MusicDAO();

        if (isset($_POST['submitMusic'])) {
            $music = new Music();
            $music->setName($_POST['name']);
            $music->setDate($_POST['date']);

            // Handle file upload
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../assets/images/addMusic/';
                $uploadFileName = uniqid() . '_' . basename($_FILES['image']['name']); // Use a unique name to avoid overwriting

                $uploadFile = $uploadDir . $uploadFileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $music->setImage($uploadFileName);
                    header('location:' . $_SERVER['HTTP_REFERER']);
                } else {
                    echo 'File upload failed.';
                    // Handle error as needed
                }
            } else {
                echo 'Error during file upload.';
                // Handle error as needed
            }
            $music->getUser()->setId($_POST['iduser']);
            $music->getGenre()->setId($_POST['genre']);
            $musicDAO->cerateMusic($music);
        }

        $musics = $musicDAO->getMusicByIdMusic();
        $this->view('music', ['musics' => $musics]);
    }

}