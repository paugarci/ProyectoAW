<?php

    class Role {
        //  Fields
        private $m_Name;
        private $m_Privileges;

        //  Constructors
        private function __construct($name, $privileges) {
            $this->m_Name = $name;
            $this->m_Privileges = $privileges;
        }

        //  Methods
        public static function buildFromFile($filepath) {
            if (!file_exists($filepath))
                return null;

            $file = fopen($filepath, 'r');

            if (!$file)
                return null;

            $filename = basename($filepath, ".txt");
            
            $privileges = new Privileges();

            while (($line = fgets($file)) !== false) {
                $line = trim($line);

                if (empty($line))
                    continue;
                
                $privileges->addPrivilege($line);
            }

            return new Role($filename, $privileges);
        }

        public function getName() {
            return $this->m_Name;
        }
        public function getPrivileges() {
            return $this->m_Privileges;
        }
    }

?>