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
            <li> <a href="<?php echo base_url()?>listEvent">Event</a></li>
            <li class="active"><a href="#">Event Detail</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="col">
          <h3><?php echo $event['title']?></h3>
             <img border="0" alt="event-img" src="<?php echo base_url().$event['event_file']?>" style="max-height: 150px" >
          <p><?php echo $event['description']?></p>
         
         Ticket :
         <ul> 
         <?php foreach ($ticket as $i ) { ?>
            <li> <?php echo $i['name'].'-'.$i['price']; ?> </li>  
         <?php }?>
          </ul>
      </div>
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
