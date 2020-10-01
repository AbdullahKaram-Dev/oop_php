<?php


namespace Core;


class File
{
    public $imageName;
    public $imageTmp;
    public $imageError;
    public $imageSize;
    public $imageType;
    public $newImageName;
    public $imageExtension;

    public function __construct($file)
    {
        $this->imageName  = $file['name'];
        $this->imageTmp   =   $file['tmp_name'];
        $this->imageError = $file['error'];
        $this->imageSize  =  $file['size'];
        $this->imageType  =  $file['type'];
    }


    public function rename()
    {
        $this->imageName      = explode('.',$this->imageName);
        $this->imageExtension = strtolower(end($this->imageName));
        $this->newImageName   = uniqid('', true) . '.' . $this->imageExtension;
        return $this;
    }

    public function upload($dir)
    {
        move_uploaded_file($this->imageTmp,"uploads/$dir/".$this->newImageName);
        return $this;
    }



}