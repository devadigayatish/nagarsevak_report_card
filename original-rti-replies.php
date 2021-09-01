<?php require_once('_header.php'); ?>

<style>a{ color:#337ab7; }</style>

<div id="fh5co-about" style="padding-top: 50px;">
    <div class="container">
        <div class="row row-bottom-padded-md">
            <div class="col-md-12 animate-box fadeInUp animated">
                <h3><strong> ORIGINAL RTI REPLIES </strong></h3>
                <p>
                    Applications under Right To Information Act (RTI) were filed in 15 ward offices of Pune Municipal Corporation. The ward offices provided us with hard copies of the information. We have scanned those copies and are providing the same as it is for reference. Please download the file by clicking on the appropriate Ward office name.
                </p>

                <div class="row">
                    <?php
                        $data = [
                            array(
                                "lbl" => "Aundh-Baner",
                                "url" => "https://drive.google.com/drive/folders/1Mq9Ei4Q6priVuru1NPd3R2W8tEAA5Kw3?usp=sharing"
                            ),

                            array(
                                "lbl" => "BhavaniPeth",
                                "url" => "https://drive.google.com/drive/folders/1hqAtEbAdwbkl0yq6hYNbNCGQ33TA4TGD?usp=sharing"
                            ),

                            array(
                                "lbl" => "Bibvewadi",
                                "url" => "https://drive.google.com/drive/folders/1jBom4SZzcMXeZ5Kd6wMbh3BaU3UNaIHy?usp=sharing"
                            ),

                            array(
                                "lbl" => "Dhankawdi-Sahakarnagar",
                                "url" => "https://drive.google.com/drive/folders/1GVtkbhWY9ZZa207RrkI_0TX71xHM6-nO?usp=sharing"
                            ),

                            array(
                                "lbl" => "DholePatilRd",
                                "url" => "https://drive.google.com/drive/folders/1a4X23K38a_b9qHn35ncus8ax3wLvDdGx?usp=sharing"
                            ),

                            array(
                                "lbl" => "Hadapsar-Mundhwa",
                                "url" => "https://drive.google.com/drive/folders/1wNwA_MW9K7Y9qqp2l0qVMrwyeD_fjokF?usp=sharing"
                            ),

                            array(
                                "lbl" => "Kasba-VishrambagWada",
                                "url" => "https://drive.google.com/drive/folders/1wzGkcLmVTqO2sbQrQiviqfAexy_nNcHe?usp=sharing"
                            ),

                            array(
                                "lbl" => "Kondhwa-Yewlewadi",
                                "url" => "https://drive.google.com/drive/folders/1BkAIpGceDgzWy2hbpuI5emBXGeu8mQmV?usp=sharing"
                            ),

                            array(
                                "lbl" => "Kothrud-Bavdhan",
                                "url" => "https://drive.google.com/drive/folders/1p-rrWcpiSsXgKXYtVsNGFlun9nVq4ftx?usp=sharing"
                            ),

                            array(
                                "lbl" => "NagarRd-WadgaonSheri",
                                "url" => "https://drive.google.com/drive/folders/1WojsINCbp0v32nQAcxiPdqhlikvo8fYk?usp=sharing"
                            ),

                            array(
                                "lbl" => "Shivajinagar-GholeRd",
                                "url" => "https://drive.google.com/drive/folders/1XS15eEzbBT8hq1Q1W7fAQY1pl8d3U7Wu?usp=sharing"
                            ),

                            array(
                                "lbl" => "SinhgadRd",
                                "url" => "https://drive.google.com/drive/folders/1twACWjyHDRuSluHmbZbhDHGq_dQ8NtrB?usp=sharing"
                            ),

                            array(
                                "lbl" => "Wanawdi-RamTekdi",
                                "url" => "https://drive.google.com/drive/folders/1cVsEGZcQyS68MU5rN615fRd0_k-9mVLl?usp=sharing"
                            ),

                            array(
                                "lbl" => "Warje-KarveNagar",
                                "url" => "https://drive.google.com/drive/folders/1jexEn0Q5sF3VM5tl_gGhOA_Ar3HrZPsS?usp=sharing"
                            ),

                            array(
                                "lbl" => "Yerawada-Kalas-Dhanori",
                                "url" => "https://drive.google.com/drive/folders/1OqGRNzqNxWFcTX8U_3Dda1JL9rtcMnQY?usp=sharing"
                            )
                        ];

                        foreach($data as $row){
                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <p><a href="<?php echo $row["url"]; ?>" target="_blank" class="btn btn-primary"><strong> <?=$row["lbl"]; ?> </strong></a></p>
                            </div>
                                
                            <?php
                        }
                    ?>
                </div>

                <br>
                
                <hr>
                <p>
                    Applications under Right To Information Act (RTI) were filed in main building of Pune Municipal Corporation & Commissioner of Police, Pune. The respective offices provided us with hard copies of the information. We have scanned those copies and are providing the same as it is for reference. Please download the required files.
                </p>
                <br>

                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <p><a href="<?php echo "https://drive.google.com/file/d/1GQZZ3zr_CB2qCWLpbg7De6wTe20NA6-A/view?usp=sharing"; ?>" target="_blank" class="btn btn-primary"><strong> Attendance List </strong></a></p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <p><a href="<?php echo "https://drive.google.com/file/d/1nefyvZbDtgKsnckYBT5RXqHHLpEyE4sZ/view?usp=sharing"; ?>" target="_blank" class="btn btn-primary"><strong> Committee Attendance List </strong></a></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php require_once('_footer.php'); ?>