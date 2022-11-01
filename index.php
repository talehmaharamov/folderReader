<?php

class FolderReader
{
    public  $n;
    function __construct($n)
    {
        $this->n = $n;
    }
    public function read()
    {
        $alphabet = range('a', 'z');
        for ($i = 1; $i <= $this->n; $i++) {
            for ($k = 1; $k <= 3; $k++) {
                $myfile = fopen("folder_" . $i . "/somefile_" . $k.".txt", "r") or die("Unable to open file!");
                echo fread($myfile, filesize("folder_" . $i . "/somefile_" . $k.".txt"));
                fclose($myfile);
            }
            for ($j = 0; $j < count($alphabet); $j++) {
                for ($f = 1; $f <= 3; $f++) {
                    $myfile2 = fopen("folder_" . $i . "/folder_" . $alphabet[$j] . "/somefile_" . $f.".txt", "r") or die("Unable to open file!");
                    echo fread($myfile2, filesize("folder_" . $i . "/folder_" . $alphabet[$j] . "/somefile_" . $f.".txt"));
                    fclose($myfile2);
                }
            }
        }
    }
}
$folder = new FolderReader(5);
echo $folder->read();
