<?php

namespace es\ucm\fdi\aw\DTO;

require_once 'includes/config.php';

class ProductDTO extends DTO
{
    private $m_ID;
    private $m_Name;
    private $m_Description;
    private $m_ImgPath;
    private $m_Price;

    public function __construct($id, $name, $description, $imgPath, $price)
    {
        $this->m_ID = $id;
        $this->m_Name = $name;
        $this->m_Description = $description;
        $this->m_ImgPath = $imgPath;
        $this->m_Price = $price;
    }
    public function getID()
    {
        return $this->m_ID;
    }
    
    public function getName()
    {
        return $this->m_Name;
    }
    
    public function getDescription()
    {
        return $this->m_Description;
    }
    
    public function getImgName()
    {
        return $this->m_ImgPath;
    }
    
    public function getPrice()
    {
        return $this->m_Price;
    }
    public function setName($name)
    {
        $this->m_Name = $name;
    }
    
    public function setDescription($description)
    {
        $this->m_Description = $description;
    }
    
    public function setImgPath($imgPath)
    {
        $this->m_ImgPath = $imgPath;
    }
    
    public function setPrice($price)
    {
        $this->m_Price = $price;
    }
}