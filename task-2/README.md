PHP  - Function for an abstract file system</h1>


Write a function that provides change directory (cd) function for an abstract file system.

Notes:

- Root path is '/'.
- Path separator is '/'.
- Parent directory is addressable as '..'.
- Directory names consist only of English alphabet letters (A-Z and a-z).
- The function will not be passed any invalid paths.
- Do not use built-in path-related functions.


## For example::

```shell
$path = new Path('/a/b/c/d');
$path->cd('../x')
echo $path->currentPath;
```

should display '/a/b/c/x'.



## 
```shell
class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function cd($newPath)
    {

    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;
```




