<div class='col-sm-6 col-md-3'>
    <div class='text-center'><h3>Prabhag No <?=$prabhag; ?></h3></div>
    <?php
        if($data){   ?>
            
                <table class='table-bordered table-condensed'>
                    <colgroup>
                        <col style='width:70%;'>
                        <col style='width:30%;'>
                    </colgroup>
                    <thead>
                        <tr>
                            <th><strong>Details Of Work</strong></th>
                            <th><strong>Amount (Rs.)</strong></th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($year as $k => $yr) {
                            if($data[$yr]){
                                ?>
                                <tbody class="<?=(($k)%2==0) ? 'table-even' : 'table-odd'; ?>">
                                    <tr align="center">
                                        <td colspan="2"><strong><?=$data[$yr][0]['Year']; ?></strong></td>
                                    </tr>
                                    <?php
                                    foreach ($data[$yr] as $key => $row) 
                                    {  ?>
                                        
                                        <tr>
                                            <td><?=$row['Details_Of_Work']; ?></td>
                                            <td><?=$row['Amount']; ?></td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <?php
                            }
                        }
                    ?>
                    <tfoot>
                        <tr align="center">
                            <td colspan="2"><strong>Total</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Total Amount</strong></td>
                            <td><strong><?=$total_amt; ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
    <?php
        }
        else{   ?>
            <div class='text-center'><h3><strong>No data found</strong></h3></div>
    <?php
        }   ?>
</div>