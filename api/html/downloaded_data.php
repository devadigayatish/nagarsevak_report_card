
<div class='text-center'><h2>Download Data</h2></div>
<div id='downloadList' class='row nav'>
    <a class='btn btn-primary' target='_self' rel='' 
        href='uploads/Nagarsevak_Full_Data.zip' 
        data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'
    >All Prabhags</a>&nbsp

    <?php
        foreach ($list as $lbl) {   ?>

            <a class='btn btn-primary' target='_self' rel='' 
                href='csv/<?=$prabhag_num . $lbl; ?>.csv' 
                data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'
            >Prabhag <?=$prabhag_num . $lbl; ?></a>&nbsp
            
    <?php
        }   ?>

    <a class='btn btn-primary' target='_self' rel='' 
        href='original-rti-replies.php' 
        data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'
    >Original RTI Replies</a>&nbsp

    <a class='btn btn-primary' target='_blank' rel='' 
        href='uploads/Nagarsevak_Contact_Info.pdf' 
        data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'
    >Nagarsevak Contact Info</a>&nbsp
</div>