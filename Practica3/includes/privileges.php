<?php

class Privileges implements Iterator {
    //  Fields
    private $m_Index;
    private $m_PrivilegeArray;

    //  Constructors
    public function __construct() {
        $this->m_Index = 0;
        $this->m_PrivilegeArray = array();
    }

    //  Interface implementations
    public function current(): mixed {
        return $this->m_PrivilegeArray[$this->m_Index];
    }
    public function key(): mixed {
        return $this->m_Index;
    }
    public function next(): void {
        ++$this->m_Index;
    }
    public function rewind(): void {
        $this->m_Index = 0;
    }
    public function valid(): bool {
        return isset($this->m_PrivilegeArray[$this->m_Index]);
    }

    //  Methods
    public function hasPrivilege($privilege) {
        return in_array($privilege, $this->m_PrivilegeArray);
    }
    public function addPrivilege($privilege) {
        if (!$this->hasPrivilege($privilege))
            array_push($this->m_PrivilegeArray, $privilege);
    }
    public function removePrivilege($privilege) {
        if ($this->hasPrivilege($privilege))
            unset($m_PrivilegeArray[$privilege]);
    }
    public function merge($other) {
        if (!is_a($other, 'Privileges'))
            return;
        
        foreach ($other->m_PrivilegeArray as $privilege) {
            $this->addPrivilege($privilege);
        }
    }
}