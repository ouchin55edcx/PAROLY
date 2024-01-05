<?php
require_once 'User.php';
class Playlist
{
    private $id;
    private $name;
    private $desc;
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }


    public function getDesc()
    {
        return $this->desc;
    }


    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
