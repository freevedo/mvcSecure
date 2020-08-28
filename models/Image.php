<?php
    class Image
    {
        private $_id;
        private $_name;
        private $_title;
        private $_category;
        
        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function hydrate(array $data)
        {
            foreach($data as $key => $value)
            {
                $method = 'set'.ucfirst($key);

                if(method_exists($this,$method))
                    $this->$method($value);
            }
        }

        //SETTERS

        public function setId($id)
        {
            $id = (int) $id;
            if($id > 0)
                $this->_id = $id;
        }
        public function setTitle($title)
        {
            if(is_string($title))
                $this->_title = $title;
        }
        public function setName($name)
        {
            if(is_string($name))
                $this->_name = $name;
        }
        public function setCategory($category)
        {
            $category = (int) $category;
            if($category > 0)
                $this->_category = $category;
        }

        //GETTERS

        public function getId()
        {
            return $this->_id;
        }
        public function getTitle()
        {
            return $this->_title;
        }
        public function getName()
        {
            return $this->_name;
        }
        public function getCategory()
        {
            return $this->_category;
        }
    }