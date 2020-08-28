<?php 
    class Article 
    {
        private $_id;
        private $_title;
        private $_content;

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
        public function setContent($content)
        {
            if(is_string($content))
                $this->_content = $content;
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
        public function getContent()
        {
            return $this->_content;
        }
    }