<?php

class Privileges
{
    const DELIMITER = '.';

    private $m_PrivilegeMap;

    public function __construct()
    {
        $this->m_PrivilegeMap = array();
    }

    public function hasPrivilege($privilegeKey)
    {
        $splitKey = explode(Privileges::DELIMITER, $privilegeKey);

        if (empty($splitKey))
            return false;

        $valid = true;
        $foundPrivilege = false;
        $privilegeValue = false;

        $keyIndex = 0;
        $currentKey = $splitKey[$keyIndex];
        $currentPrivilegeMap = $this->m_PrivilegeMap;

        while ($valid && !$foundPrivilege) {
            $value = $currentPrivilegeMap[$currentKey];

            if (!is_array($value)) {
                if (is_bool($value)) {
                    $privilegeValue = $value;
                    $foundPrivilege = true;
                } else
                    $valid = false;
            } else {
                if ($keyIndex >= count($splitKey))
                    $valid = false;
                else {
                    $currentPrivilegeMap = $value;
                    $currentKey = $splitKey[++$keyIndex];
                }
            }
        }

        return $valid ? $privilegeValue : false;
    }
    public function addPrivilege($privilegeKey)
    {
        $splitKey = explode(self::DELIMITER, $privilegeKey);

        if (empty($splitKey))
            return;

        $finished = false;

        $keyIndex = 0;
        $currentKey = $splitKey[$keyIndex];
        $currentPrivilegeMap = $this->m_PrivilegeMap;
        
        while ($finished) {
            if ($keyIndex == count($currentPrivilegeMap) - 1) {
                $currentPrivilegeMap[$currentKey] = true;
                $finished = true;
            }     
            else {
                if (!isset($currentPrivilegeMap[$currentKey])) {
                    $currentPrivilegeMap[$currentKey] = array();
                }
                
                $currentKey = $splitKey[++$keyIndex];
                $currentPrivilegeMap = $currentPrivilegeMap[$currentKey];
            }       
        }
    }
    public function removePrivilege($privilegeKey)
    {
        $splitKey = explode(self::DELIMITER, $privilegeKey);

        if (empty($splitKey))
            return;

            $finished = false;
    
            $keyIndex = 0;
            $currentKey = $splitKey[$keyIndex];
            $currentPrivilegeMap = $this->m_PrivilegeMap;
            
            while ($finished) {
                if ($keyIndex == count($currentPrivilegeMap) - 1) {
                    $currentPrivilegeMap[$currentKey] = true;
                    $finished = false;
                }     
                else {
                    if (!isset($currentPrivilegeMap[$currentKey])) {
                        $currentPrivilegeMap[$currentKey] = array();
                    }
                    
                    $currentKey = $splitKey[++$keyIndex];
                    $currentPrivilegeMap = $currentPrivilegeMap[$currentKey];
                }       
            }
    }
}