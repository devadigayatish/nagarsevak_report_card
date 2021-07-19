<?php require_once('_header.php'); ?>

<div id="fh5co-about" style="padding-top: 50px;">
    <div class="container animate-box">
        <div class="row row-bottom-padded-md">
            <div class="col-md-8">
                <h2><strong> REPORT BUG / GIVE SUGGESTIONS</strong></h2>
                <br>
                <p>
                    Thanks for coming here !!!
                    <br>
                    We welcome your suggestions to improve this website. Let us know what more information you would like to see on this website. Also if you find any errors or bugs, kindly bring it to our notice. We would try to fix it as early as possible.
                </p>

                <?php // require_once('includes/email-sender.php'); ?>
                
                <form action="" method="post" enctype='multipart/form-data' onsubmit="return checkEmail();">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" id="txtEmail"  name="email" required="" class="form-control" placeholder="Your Email ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="message" required="" class="form-control" id="" cols="30" rows="7" placeholder="Please give a detailed description about the issue or suggestion"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type='file' name='userFile'> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Submit" name="submit" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once('_footer.php'); ?>