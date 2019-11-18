<?php
    session_start();
    include("database.php");
    
    $sql = mysqli_real_escape_string($conn, $_REQUEST["code"]);

    $com = strtoupper(explode(" ", $sql)[0]);

    if($com == "USE")
    {
        $dbname = explode(" ", $sql)[1];

        $result = mysqli_query($conn, "SHOW DATABASES");

        $found = false;
        while($row = mysqli_fetch_array($result))
        {
            if($row[0] == $dbname)
            {
                $found = true;
                break;
            }
        }

        if($found)
        {
            $_SESSION["dbase"] = $dbname;
            echo "Database changed.";
        }
        else
        {
            echo $dbname . " doesn't exist";
        }
    }
    else if($com == "CREATE" || $com == "INSERT")
    {
        mysqli_select_db($conn, $_SESSION["dbase"]);
        if(!mysqli_query($conn, $sql))
        {
            echo mysqli_error($conn);
        }
    }
    else
    {
        mysqli_select_db($conn, $_SESSION["dbase"]);

        echo "<table class='table'>\n";

        if($result = mysqli_query($conn, $sql))
        {
            if($row = mysqli_fetch_array($result))
            {
                echo "<tr class='tr'>\n";
                $array = $row;
                
                for($i = 1; $i < sizeof($array); $i+=2)
                {
                    echo "<th class='th'>".array_keys($array)[$i]."</th>\n";
                }

                echo "</tr>\n";

            }

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr class='tr'>\n";
                for($i = 0; $i < sizeof($row)/2; $i++)
                {
                    echo "<td class='td'>".$row[$i]."</td>\n";
                }

                echo "</tr>\n";

            }
        }
        else
        {
            echo mysqli_error($conn);
        }

        echo "</table>";
    }
?>