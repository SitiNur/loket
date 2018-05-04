<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- 
<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

 -->
 <head>
 	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url()?>assets/css/dashboard.css" rel="stylesheet" id="dashboard-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>   

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>

    <!-- Bootstrap Date-Picker Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"/>

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
            <li> <a href="<?php echo base_url()?>listEvent">Event</a></li>
            <li class="active"><a href="#">Event Detail</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="col">
          <h2><?php echo $event['title']?></h2>
             <img border="0" alt="event-img" src="<?php echo base_url().$event['event_file']?>" width="50%" >
          <p><?php echo $event['description']?></p>
         
         Ticket :
         <ul> 
         <?php foreach ($ticket as $i ) { ?>
            <li> <?php echo $i['name'].'-'.$i['price']; ?> </li>  
         <?php }?>
          </ul>
      </div>
        
            
    </div>

   

    <footer class="footer">
      <div class="container">
        <p class="text-muted">LOKET.COM - Software Engineer Assignment</p>
      </div>
    </footer>

</body>

<script type="text/javascript">
    
</script>
