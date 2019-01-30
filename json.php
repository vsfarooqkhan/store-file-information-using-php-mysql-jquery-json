<?php
        
        $db = mysqli_connect('localhost', 'root', 'aaaa0000', 'farooq');
        $sql = 'SELECT * FROM filedetails';
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($result))
            $test[] = $row; 
        print json_encode($test);

    ?>
