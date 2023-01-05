<?php
session_start();
$_SESSION['captcha'] = rand(10000,100000);
?>                            <input class="form-control" type="hidden" name="captcha" value="<?php echo $_SESSION['captcha']; ?>">
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">SUBMIT</button>
                        </div>
                    </div>