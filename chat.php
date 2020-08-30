<?php
require_once 'header.php' ;
require_once 'classes/Tasks.php' ;
require_once 'classes/Employee.php' ;
$emp = new Employee ;
$result = $emp->employeesNames() ;


if ( ! isset($_SESSION['empId'])) { 
  header('location:admLogin.php'); 

}

?>


<!DOCTYPE html>
<head>	
<title>Chat</title>	


<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
	

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript" ></script>	
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" type="text/javascript" ></script>	
<script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js" type="text/javascript" ></script>				
	
<style = "text/css">	
.messages_display {height: 300px; overflow: auto;}		
.messages_display .message_item {padding: 0; margin: 0; }		
.bg-danger {padding: 10px;}	

  body{
  background-color: #ffffff;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23ffffff' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23ffffff' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23f8f8f8' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23f0f0f0' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23e9e9e9' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23e1e2e2' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23dadbda' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%23d3d3d3' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23cbcccc' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%23c4c5c5' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23bdbebe' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23b6b7b7' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%23afb0b0' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23a8aaa9' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23a1a3a2' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%239a9c9b' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%23939594' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%238d8f8e' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23868887' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;}


</style>






</head>
<body>

<br />	


<!-- <nav>
    <h1>Hi , <?php // echo $_SESSION['empName'] ; ?></h1>
			<ul id="navli">
				<li><a class="homered" href="myTasks.php">My Tasks</a></li>
				<li><a class="homeblack" href="chat.php">Chat</a></li>
                <li><a class="homeblack" href="myProfile.php">My Profile</a></li>
                <li><a class="homeblack" href="handlers/logoutHandle.php">Logout</a></li>

			</ul>
</nav> -->

<!--Form Start-->
<div class = "container">		
	<div class = "col-md-7 m-auto  chat_box" id="chatbox">						
		<div class = "form-control messages_display"></div>			
		<br />						
		<div class = "form-group">						
			<!-- <input type = "text" class = "input_name form-control" placeholder = "Enter Name" />			 -->
            <select class="input_name form-control"  name="empName">
                    <?php 
                        $employee = new Employee ;
                        $result = $employee->employeesNames() ;
                        ?>
                        <option ><?php   echo $_SESSION['empName'] ;  ?></option>

                          
                                    

            </select>
        
        </div>						
		<div class = "form-group">						
			<textarea class = "input_message form-control" placeholder = "Enter Message" rows="5"></textarea>			
		</div>						
		<div class = "form-group input_send_holder">				
			<input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />			
		</div>					
	</div>	

<!--form end-->
	
	<script type="text/javascript">			
	
// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

// Add API Key & cluster here to make the connection 
var pusher = new Pusher('e3bb1da5483d46c37858', {
      cluster: 'mt1'
    });

// Enter a unique channel you wish your users to be subscribed in.
var channel = pusher.subscribe('test_channel');

// bind the server event to get the response data and append it to the message div
channel.bind('my_event',
    function(data) {
        //console.log(data);
        $('.messages_display').append('<p class = "message_item">' + data + '</p>');
        $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />');
        $(".messages_display").scrollTop($(".messages_display")[0].scrollHeight);
    });

// check if the user is subscribed to the above channel
channel.bind('pusher:subscription_succeeded', function(members) {
    console.log('successfully subscribed!');
});

// Send AJAX request to the PHP file on server 
function ajaxCall(ajax_url, ajax_data) {
    $.ajax({
        type: "POST",
        url: ajax_url,
        //dataType: "json",
        data: ajax_data,
        success: function(response) {
            console.log(response);
        },
        error: function(msg) {}
    });
}

// Trigger for the Enter key when clicked.
$.fn.enterKey = function(fnc) {
    return this.each(function() {
        $(this).keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        });
    });
}

// Send the Message enter by User
$('body').on('click', '.chat_box .input_send', function(e) {
    e.preventDefault();

    var message = $('.chat_box .input_message').val();
    var name = $('.chat_box .input_name').val();

    // Validate Name field
    if (name === '') {
        bootbox.alert('<br /><p class = "bg-danger">Please enter a Name.</p>');
    } 

	else if (message !== '') {
        // Define ajax data
        var chat_message = {
            name: $('.chat_box .input_name').val(),
            message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
        }
        //console.log(chat_message);
        // Send the message to the server passing File Url and chat person name & message
        ajaxCall('message.php', chat_message);

        // Clear the message input field
        $('.chat_box .input_message').val('');
        // Show a loading image while sending
     //   $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block" disabled /> &nbsp;<img     src = "loading.gif" />');
    }
});

// Send the message when enter key is clicked
$('.chat_box .input_message').enterKey(function(e) {
    e.preventDefault();
    $('.chat_box .input_send').click();
}); 
</script>
</div>
</body>