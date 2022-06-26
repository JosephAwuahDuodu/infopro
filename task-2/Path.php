<?php

class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function cd(string $newPath): string
    {
        $newPath =  (is_string($newPath)) ? $this->validate_path_string($newPath) : "Not a valid string" ;

        $this->currentPath = $newPath;
        
        return $this->currentPath;
    }

    public function validate_path_string(string $newPath): string
    {
        switch ($newPath) {
            case '..':
                return "..";
                break;
            
            default:
                # code...
                break;
        }

    }

    public function check_for_separator(string $path): string
    {
        return "";
    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;