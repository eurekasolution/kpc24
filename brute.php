<?php
    $letters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $size = strlen($letters);

    echo "size = $size<br>";
    //$size = 5;

    $cnt = 0; // destination : dst, source : src, original : org

    for($i=0; $i<$size; $i++)
    {
        for($j=0; $j<$size; $j++)
        {
            for($k= 0; $k<$size; $k++)
            {
                for($l=0; $l<$size; $l++)
                {
                    $pw = $letters[$i] . $letters[$j] . $letters[$k] . $letters[$l];
                    //echo "pw = $pw<br>";
                    // DB 비교
                    $sql = "select * from users where pass=password('$pw')";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_array($result);

                    if($data)
                    {
                        while($data)
                        {
                            echo "id: $data[id] , pw = $pw<br>";
                            $data = mysqli_fetch_array($result);
                        }
                    }
                }
                
            }
        }
    }

?>