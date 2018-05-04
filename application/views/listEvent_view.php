<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <head>
  <!-- jquery -->
 	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- Bootsrap-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> 
  <!-- Custom CSS -->  
  <link href="<?php echo base_url()?>assets/css/dashboard.css" rel="stylesheet" id="dashboard-css">
  <link href="<?php echo base_url()?>assets/css/listEvent.css" rel="stylesheet" id="listEvent-css">

 </head>

 <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">LOKET</a> -->
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(isset($this->session->userdata['first_name'])){ ?>
              <li> <a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
            <?php } ?>
            <li class="active"> <a href="<?php echo base_url()?>listEvent">Event</a></li>
            <li><a href="#">Event Detail</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <br>
    <div class="container">
        <?php foreach ($list_event as $i) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="<?php echo base_url().$i['event_file']?>" alt="event-img">
                        <div class="overlay">
                            <h2><?php echo $i['title']?></h2>
                            <p>
                              <a href="<?php echo base_url().'detail/index/'.base64_encode($i['id_event'])?>">Event Detail</a>
                            </p>
                        </div>
                </div>
            </div>
        <?php } ?>
    </div>

   
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <p class="text-muted">LOKET.COM - Software Engineer Assignment</p>
      </div>
    </footer>

</body>

<script type="text/javascript">
    
</script>
