<div class='<?=$config["class_name"]; ?>'>
    <div class='text-center'><h3><?=$prabhag . " - " . $person_info["Nagarsevak_Name"] . " (". $person_info["Party"] .")"; ?></h3></div>
    <?php
        if($data){   ?>
            
                <table class='table-bordered table-condensed'>
                    <colgroup>
                        <col style='width:70%;'>
                        <col style='width:30%;'>
                    </colgroup>
                    <thead>
                        <tr>
                            <th><strong>Type Of Work</strong></th>
                            <th><strong>Amount (Rs.)</strong></th>
                        </tr>
                    </thead>
                    <?php
                        $last_yr = "";
                        $total = [];
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
                                            <td>
                                                <span class="code" data-toggle="tooltip" data-placement="top" title="<?=$row['Work_Type']; ?>"><?=$row['Code']; ?></span>
                                            </td>
                                            <td align="right"><?=moneyFormatIndia($row['Amount']); ?></td>
                                            <?php $total[$yr][] = $row['Amount']; ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                        <tr align="center">
                                            <td colspan="2"><strong>Total Amount : <?=moneyFormatIndia(array_sum($total[$yr])); ?></strong></td>
                                        </tr>
                                </tbody>
                                <?php
                            }
                        }
                    ?>
                    <tfoot>
                        <tr align="center">
                            <td colspan="2"><strong>Final Total</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Total Amount</strong></td>
                            <td align="right"><strong><?=moneyFormatIndia($total_amt); ?></strong></td>
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