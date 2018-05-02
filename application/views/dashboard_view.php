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

    <script src="<?php echo base_url()?>assets/plugins/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/datatables.bootstrap.js"></script>

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
          <a class="navbar-brand" href="#">LOKET</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"> <a href="#">Dashboard</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="<?php echo base_url()?>login/logout">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
        <div class="page-header">
            <h2>Dashboard</h2> 
            <div class="btn-group btn-group-devided">
                <a data-toggle="modal" href="#modalAdd" class="btn btn-circle btn-primary add">
                    <i class="fa fa-plus"></i>
                         <span class="hidden-xs"> Add </span>
                </a>
            </div>
        </div>
        <div>
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="myTable">
                <thead>
                    <tr>
                        <th class="all">Event</th>
                        <th class="all">Description</th>
                        <th class="all">Date and Time</th>
                        <th class="all">Location</th>
                        <th class="all">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['datetime']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td>edit delete</td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
        </div>


    </div>

    <!-- Modal Add start-->
        <div class="modal fade" id="modalAdd" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Event</h4>
                    </div>
                     <form id="addForm" action="<?php echo base_url()?>dashboard/addEvent" method="post">
                    <div class="modal-body">
                            <div class="form-group">
                                <label>Event : </label>
                                <input id="title" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Description : </label>
                                <input id="description" type="text" name="description">
                            </div>
                            <div class="form-group">
                                <label>Date and Time : </label>
                                <input id="datetime" type="text" name="datetime">
                            </div>
                            <div class="form-group">
                                <label>Location : </label>
                                <input id="location" type="text" name="location">
                            </div>
                             <div class="form-group">
                                <label>Type Ticket : </label>
                                <input id="typeTicket" class="typeTicket" type="number" name="typeTicket">
                            </div>
                    
                            <div class="form-group">
                                <label>Ticket : </label>
                                <input type="text" name="ticket[]">
                                <label>Price</label>
                                <input type="number" name="price[]">
                                <div class="additional">
                                </div>
                            </div>
                           
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save">Add Event</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
   <!-- Modal Add end -->

    <!-- Modal Add start-->
        <div class="modal fade" id="modalDetail" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save">Save</button>
                    </div>
                </div>
            </div>
        </div>
   <!-- Modal Add end -->

    <!-- Modal Add start-->
        <div class="modal fade" id="modalDelete" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save">Save</button>
                    </div>
                </div>
            </div>
        </div>
   <!-- Modal Add end -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted">LOKET.COM - Software Engineer Assignment</p>
      </div>
    </footer>
<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script> -->
</body>

<script type="text/javascript">
    var id_user = '<?php echo $this->session->userdata['id_user']?>'; 

    $('#myTable').DataTable( {
    responsive: true,
    "columnDefs": [
    { "searchable": false, "targets": 4 }
  ]
   
} );

    
    $('body').on('change', ".typeTicket", function(){
        $(".additional").html('');
        var typeTicket = $('.typeTicket').val();
        for (var i=0; i<typeTicket-1; i++){
            $(".additional").append('<br>'+
                            '<input type="text" name="ticket[]">'+
                            '<input type="number" name="price[]">');
        }
        
    });


    $('body').on('click', ".save", function(){
        var form = $("#addForm");
        var fd = new FormData();
        fd.append('id_user',id_user);
        fd.append('title', $('#title').val());
        fd.append('description', $('#description').val());
        fd.append('datetime', $('#datetime').val());
        fd.append('location', $('#location').val());
        fd.append('typeTicket', $('#typeTicket').val());

        var ticket = [];
        $("input[name^='ticket']").each(function () {
            ticket.push($(this).val());
        });
        fd.append('ticket',  ticket);

        var price = [];
        $("input[name^='price']").each(function(){
            price.push(this.value);
        });
        fd.append('price', price);

        $.ajax({
            url: form.attr("action"),
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType : 'JSON' ,
            success: function(data){

            },
        });

    });



</script>
