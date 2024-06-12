<?php
    function getDirs($path)
    {
        $dirHandler = opendir($path);
        while( ($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                $files[] = $filename;
            }
        }
        return $files;
    }
    function getFiles($path)
    {
        $dirHandler = opendir($path);
        while( ($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                
            }else
            {
                $files[] = $filename;
            }
        }
        return $files;
    }

    function readFileSecure($path)
    {
        if(!$handler = fopen($path, "r"))
            return "File Open Error";

        $fileContent = file_get_contents($path, true);
        return $fileContent;
    }

    $sess_path = "sess_path";

    if(!isset($_SESSION[$sess_path]) or $_SESSION[$sess_path] == "")
    {
        $_SESSION[$sess_path] = "./";
    }

    if(isset($_GET["pdir"]))
    {
        $_SESSION[$sess_path] = $_GET["pdir"];
    }
?>

<div class="row">
    <div class="col-3">
        <table class="table table-bordered">
            <?php
                $dirs = getDirs($_SESSION[$sess_path]);
                $cnt = 0;

                while(isset($dirs[$cnt]))
                {
                    $nextDir = $_SESSION[$sess_path] . "/" . $dirs[$cnt];
                    echo "
                    <tr>
                        <td><a href='index.php?cmd=ftp&pdir=$nextDir'>$dirs[$cnt]</a></td>
                    </tr>
                    ";
                    $cnt ++;
                }
                
            ?>
        </table>
    </div>
    <div class="col">
    <table class="table table-bordered">
            <?php
                $files = getFiles($_SESSION[$sess_path]);
                $cnt = 0;

                while(isset($files[$cnt]))
                {
                    echo "
                    <tr>
                        <td><a href='index.php?cmd=ftp&pfile=$files[$cnt]'>$files[$cnt]</a></td>
                    </tr>
                    ";
                    $cnt ++;
                }
                
            ?>
        </table>

        <?php
            if(isset($_GET["pfile"]))
            {
                $fileContent = readFileSecure($_SESSION[$sess_path] . "/" . $_GET["pfile"]);
            }else
            {
                $fileContent = "";
            }
        ?>

        <div class="row">
            <div class="col">
                <textarea class="form-control" rows="10" name="fdata"><?php echo $fileContent?></textarea>
            </div>
        </div>

    </div>
</div>