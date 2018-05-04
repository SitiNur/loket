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
	
    <!-- Datatables -->
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
            <li class="active"> <a href="">Dashboard</a></li>
            <li><a href="<?php echo base_url()?>login/logout">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
        <div class="page-header">
            <h3 style="width: 50%">Hello <?php echo $this->session->userdata['first_name'];?></h3> 
             <div class="btn-group btn-group-devided">
                <a data-toggle="modal" href="#modalAdd" class="btn btn-circle btn-primary add">Add Event
                </a>
            </div>
        </div>

        <div>
            <table class="table table-striped table-bordered table-hover" width="100%" id="myTable">
                <thead>
                    <tr>
                        <th class="all" style="width: 150px">Event Title</th>
                        <th class="all" style="width: 360px">Description</th>
                        <th class="all" style="width: 150px">Date and Time</th>
                        <th class="all" style="width: 100px">Location</th>
                        <th class="all" style="width: 250px">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['datetime']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td> 
                                <a href="<?php echo base_url()."detail/index/".base64_encode($row['id_event'])?>" class="btn btn-default">Detail
                                </a>
                                <?php if(isset($this->session->userdata['twitter_user_id'])){?>
                                     <a id="<?php echo base64_encode($row['id_event'])?>" href="<?php echo base_url()."twitter/post/".base64_encode($row['id_event'])?>" class="btn btn-circle btn-info share">Share
                                    </a>
                                <?php } ?>
                                <a id="edit_<?php echo $row['id_event']?>" data-toggle="modal" href="#modalEdit" class="btn btn-warning edit">Edit
                                </a>
                                <a id="del_<?php echo $row['id_event']?>" data-toggle="modal" href="#modalDelete" class="btn btn-danger del"> Delete
                                 </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Event title">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"></textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <select class="form-control" id="location" placeholder="location">
                                <option selected="true" disabled="disabled">Choose Location</option>
                                <?php foreach ($location_option as $i) { ?>
                                    <option value="<?php echo $i['id_location']?>"><?php echo $i['location']?></option>
                                <?php } ?>
                                
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class='input-group date' id='datetimepicker5'>
                                <input id="datetime" name="datetime" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <input id="userfile" type="file" name="userfile" class="form-control">
                        </div>

                         <div class="form-group col-md-6" >
                            <input type="number" class="form-control typeTicket" id="typeTicket" name="typeTicket" placeholder="Number of ticket types">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="ticket[]" class="form-control" placeholder="Type of ticket">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" name="price[]" class="form-control" placeholder="Price">
                        </div>
                         
                        <div class="additional">
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

   <!-- Modal Edit start-->
        <div class="modal fade" id="modalEdit" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Event Data</h4>
                    </div>
                    <form id="editForm">
                    <input id="id_event" type="hidden" name="id_event">
                    <div class="modal-body">

                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="eTitle" name="title" placeholder="Event title">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="eDescription" name="description" rows="3" placeholder="Description"></textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <select class="form-control" id="eLocation" placeholder="location">
                                <option selected="true" disabled="disabled">Choose Location</option>
                                <?php foreach ($location_option as $i) { ?>
                                    <option value="<?php echo $i['id_location']?>"><?php echo $i['location']?></option>
                                <?php } ?>
                                
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class='input-group date' id='datetimepicker5'>
                                <input id="eDatetime" name="datetime" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-6" >
                            <a id="download-img" href="#" download>
                                <img id="event-img" border="0" src="" alt="event-img" style="max-height: 80px">
                            </a>
                        </div>

                        <div class="form-group col-md-6">
                            <input id="eUserfile" type="file" name="eUserfile" class="form-control">
                        </div>

                         <div class="form-group col-md-6" >
                            <input type="number" class="form-control typeTicket" id="eTypeTicket" name="typeTicket" placeholder="Number of ticket types">
                        </div>

                        <div class="ticket">
                        </div>

    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success update">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
   <!-- Modal Edit end -->

    <!-- Modal Add start-->
        <div class="modal fade" id="modalDelete" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Event</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo base_url()?>dashboard/deleteEvent" method="post">
                            <input type="hidden" name="id_event" id="id_event_del">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success delete">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   <!-- Modal Add end -->

   <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <p class="text-muted">LOKET.COM - Software Engineer Assignment</p>
      </div>
    </footer>

</body>

<script type="text/javascript">
    <?php if($notif !=""){ ?>
        alert("<?php echo $notif;?>");
    <?php } ?>

    var id_user = '<?php echo $this->session->userdata['id_user']?>'; 
    
    $('#myTable').DataTable( {
        responsive: true,
            "columnDefs": [
            { "searchable": false, "targets": 4 }
            ],
        "ordering": false
    });

   
    $('#datetimepicker5').datetimepicker({
        defaultDate: new Date(),
         format : 'YYYY-MM-DD HH:mm'
    });
   
    /*Create Form Ticket on Add Modal*/
    $('body').on('change', "#typeTicket", function(){
        $(".additional").html('');
        var typeTicket = $('#typeTicket').val();
        if(typeTicket < 1){
            alert("Minimal number of ticket is 1");
            $('#typeTicket').val('1');
        }
        for (var i=0; i<typeTicket-1; i++){
            $(".additional").append('<div class="form-group col-md-6">'+
                            '<input type="text" name="ticket[]" class="form-control" placeholder="Type of ticket">'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<input type="number" name="price[]" class="form-control" placeholder="Price">'+
                        '</div>');
        }
        
    });

    /*Create Form Ticket on Edit Modal*/
    $('body').on('change', "#eTypeTicket", function(){
        var typeTicket = $('#eTypeTicket').val();
        console.log(typeTicket);
        if(typeTicket < 1){
            alert("Minimal number of ticket is 1");
            $('#eTypeTicket').val('1');
        }
        typeTicket = $('#eTypeTicket').val();
        $('.ticket').html('');
        for (var i=0; i<typeTicket; i++){
            $(".ticket").append('<div class="form-group col-md-6" >'+
                            '<input type="text" name="eTicket[]" class="form-control" placeholder="Type of ticket">'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<input type="number" name="ePrice[]" class="form-control" placeholder="Price">'+
                        '</div>');
        }
        
    });

    /*Save*/
    $('body').on('click', ".save", function(){
        var form = $("#addForm");
        var fd = new FormData();
        fd.append('id_user',id_user);
        fd.append('userfile', $('#userfile')[0].files[0]);
        fd.append('title', $('#title').val());
        fd.append('description', $('#description').val());
        fd.append('datetime', $('#datetime').val()+':00');
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
                if(data.return == 'true'){
                   location.reload();
                }else{
                    alert(data.error.error);
                }
            },
        });

    });

    /*Edit Modal*/
    $('body').on('click', ".edit", function(){
        $(".ticket").html('');
        var id_event = $(this).attr('id');
        id_event = id_event.split('_'); 
        id_event = id_event[1];
        $('#id_event').val(id_event);
        var fd = new FormData();
        fd.append('id_event',id_event);
      
        $.ajax({
            url: '<?php echo base_url()?>dashboard/detailEvent',
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType : 'JSON' ,
            success: function(res){
               
                if(res['return'] == 'true'){
                    $('#eTitle').val(res['data']['event']['title']);
                    $('#eDescription').val(res['data']['event']['description']);
                    $('#eDatetime').val(res['data']['event']['datetime']);
                    $("#eLocation").val(res['data']['event']['id_location']).change();
                    $("#download-img").prop("href", "<?php echo base_url()?>"+res['data']['event']['event_file']);
                    $("#event-img").attr("src", res['data']['event']['event_file']);
                    
                
                    var length = res['data']['ticket'].length;
                    $('#eTypeTicket').val(length);
                    lastTypeTicket = length;
                   
                    for(var i=0; i<length; i++){
                        $(".ticket").append('<div class="form-group col-md-6">'+
                            '<input type="text" name="eTicket[]" class="form-control" placeholder="Type of ticket" value="'+res['data']['ticket'][i]['name']+'">'+
                       '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<input type="number" name="ePrice[]" class="form-control" placeholder="Price" value="'+res['data']['ticket'][i]['price']+'">'+
                        '</div>');
                    }
                }
            },
        });

    });

    /*Update*/
    $('body').on('click', ".update", function(){
        var fd = new FormData();
        fd.append('id_event',  $('#id_event').val());
        fd.append('title', $('#eTitle').val());
        fd.append('description', $('#eDescription').val());
        fd.append('datetime', $('#eDatetime').val());
        fd.append('location', $('#eLocation').val());
        fd.append('typeTicket', $('#eTypeTicket').val());
        fd.append('userfile', $('#eUserfile')[0].files[0]);

        var ticket = [];
        $("input[name^='eTicket']").each(function () {
            ticket.push($(this).val());
        });
        fd.append('ticket',  ticket);

        var price = [];
        $("input[name^='ePrice']").each(function(){
            price.push(this.value);
        });
        fd.append('price', price);

        $.ajax({
            url: '<?php echo base_url()?>dashboard/updateEvent',
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType : 'JSON' ,
            success: function(data){
                if(data.return == 'true'){
                   location.reload();
                }else{
                    alert(data.error.error);
                }
            },
        });

    });

    /*Delete*/
    $('body').on('click', ".del", function(){
        var id_event = $(this).attr('id');
        id_event = id_event.split('_'); 
        id_event = id_event[1];
        $('#id_event_del').val(id_event);
    });
</script>
