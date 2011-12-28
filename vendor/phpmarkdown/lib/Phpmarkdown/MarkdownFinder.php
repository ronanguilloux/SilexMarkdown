<?php

/**
 * Markdown file finder
 */
class MarkdownFinder
{

    protected $basePath = '';
    protected $extension  = 'md';

    public function __construct($args = array())
    {
        if(!empty($args['path']) && file_exists($args['path'])) {
            $this->basePath = $args['path'];
        }
    }

    /**
     * Retrieve a file content using the given path
     *
     * @param string $path the markdown file path
     * @return mixed: false or the markdown file raw content (string)
     */
    public function getContent($path)
    {
        // only a page index was given ?
        if(('0' == $path) || (int)($path) > 0) {
            $path = $this->findByIndex($path);
        } else {
            $path = $this->basePath . '/' . $path;
            $infos = pathinfo($path);
            // was the extension given ?
            if(empty($infos['extension'])){
                $path .= '.md';
            }        
        }
        if(file_exists($path)){
            
            return file_get_contents($path);
        }

        return false;
    }

    /**
     * Retrieve a filepath using the index that starts the searched file name
     * by ex: 1 stands for 1-summary.md 
     *
     * @param $int the page index
     * @return string the file path that matches the given $int
     */
    protected function findByIndex($int)
    {
        $files = glob($this->basePath . "/$int-*.md");
        if(0 < count($files)) {
            
            return $files[0];
        }

        return false;
    }

    /**
     * @return array mardown file list
     */
    public function getList()
    {
       $list = glob($this->basePath . "/*.md");
       foreach($list as $key=>$item) {
           $item = pathinfo($item);
           $item = $item['filename'];
           // getting '3-Do you see any Teletubbies?.md' & returning array(3=>'Do you see any Teletubbies?')
           $item = preg_split("/^[\d-]+/", $item, 2, PREG_SPLIT_NO_EMPTY);
           $list[$key] = ucfirst($item[0]);
       }

       return $list;
    }
}