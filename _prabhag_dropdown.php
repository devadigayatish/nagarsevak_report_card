<a class="btn btn-primary" value="previous" onClick="nextPrabhag(-1)">Previous</a>&nbsp;
    <select class="input-group-sm text-left" id="users" name="users" style="width:60%;" onchange="showUser(this.value)">

    <?php
        $query = "SELECT Ward_ofc FROM wardoffice GROUP BY Ward_ofc ORDER BY Ward_ofc";
        $result = mysqli_query($con, $query);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?> <optgroup label='<?=$row["Ward_ofc"]; ?>'> <?php

                $query = "SELECT Prabhag_No, Prabhag_Name FROM wardoffice 
                    WHERE Ward_ofc = '". $row["Ward_ofc"] ."' ORDER BY Prabhag_No, Prabhag_Name";
                $res = mysqli_query($con, $query);
                if ($res->num_rows > 0) {
                    while($r = mysqli_fetch_assoc($res)) {
                        ?> <option value='<?=$r["Prabhag_No"]; ?>'>Prabhag <?=$r["Prabhag_No"]; ?>: <?=$r["Prabhag_Name"]; ?></option> <?php
                    }
                }
                ?> </optgroup> <?php
            }
        }
    ?>
    
</select>
<a class="btn btn-primary"  value="next" onClick="nextPrabhag(1)">Next</a>
