<html>
<head>

    <meta charset="utf-8">
	<title>Sistem Tata Tertib</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <style style="text/css">
        body {
            background-image: url("<?php echo base_url(); ?>bootstrap/img/background.jpg");
            background-position: 50% 50%;
            background-repeat: repeat;
        }
    </style>

</head>


<body>
    <div class="navbar" style="background: #00008B">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span><font size="6" color="#FFFFFF"><b>Sistem Tata Tertib</b></font></span></a>
            </div>
        </div>
    </div>
    <div class="cover">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row text-right">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <div class="text-center" style="color: #00008B">
                                
                            </div><br><br>
                            <div class="panel panel-primary text-left">
                                <div class="panel-heading" style="background: #00008B">
                                  <h6 class="panel-title text-left"><b>LOGIN</b></h6>
                              </div>
                              <div class="panel-body" style="background: #d3fffb">
                                  <?php echo form_open('home/login',array('class' => 'form-horizontal')); ?>
                                  <div class="form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label">Username</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="NIS/Kode Guru" name="username" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="inputPassword3" class="control-label">Password</label>
                                    </div>
                                    <div class="col-sm-10">
                                       <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required="">
                                   </div>
                               </div>
                                <?php
                                    if ($this->session->has_userdata('notif')) {
                                ?>
                                        <div class="form-group">
                                            <div class="col-sm-2">
                                                <label for="inputPassword3" class="control-label"></label>
                                            </div>
                                            <div class="col-sm-10 text-danger">
                                               <?php echo $this->session->flashdata('notif'); ?>
                                           </div>
                                       </div>
                                <?php
                                    }
                                ?>
                               <div class="form-group" >
                                <div class="col-sm-10 col-sm-offset-2 text-right">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


</body>
</html>