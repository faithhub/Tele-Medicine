
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/video-call.html  30 Nov 2019 04:12:18 GMT -->
<head>
		<meta charset="utf-8">
		<title>EdmundHealth - Dashboard {{ Auth::user()->name }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="{{ asset('call/assets/img/favicon.png') }}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('call/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{ asset('call/assets/plugins/fontawesome/css/all.min.css') }}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('call/assets/css/style.css') }}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
	
    </head>
    <style>
        .text-center{
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
        }
        .material-icons:hover{
            color:white;
        }
    </style>
	<body class="call-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
				
					<!-- Call Wrapper -->
					<div class="call">
						<div class="call-main-row">
							<div class="call-main-wrapper">
								<div class="call-view">
									<div class="call-window">
										
										<!-- Call Contents -->
										<div class="call-contents">
											<div class="call-content-wrap">
												<div class="user-video" id="subscriber">
												</div>
												<div class="my-video" id="publisher">
												</div>
											</div>
										</div>
										<!-- Call Contents -->
										
                                        <!-- Call Footer -->
                                        <!-- /Call Footer -->
                                    <div class="text-center">
                                        {{-- <button class="btn btn-success">Click</button> --}}                                       
                                        <a href="javascript:void(0);" id="close" onclick="window.close()" style="background-color:red; padding:20px; border-radius:100%">
                                            <i class="material-icons" style="font-size:50px; font-weight:800">call_end</i>
                                        </a>
                                    </div>
                                    
                                    <div class="col-3" style="position:relative; display:flex">
                                        
                                    </div>
								</div>
								
							</div>
						</div>
					</div>
					<!-- /Call Wrapper -->
					
				</div>

			</div>		
			<!-- /Page Content -->
   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ asset('call/assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('call/assets/js/popper.min.js"></script') }}"></script>
		<script src="{{ asset('call/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Custom JS -->
        <script src="{{ asset('call/assets/js/script.js"></script') }}"></script>
        <script>
          function Cancel() {
            $.ajax({
                type: "get",
                url: "{{ url('end_call') }}",
                success: function (response) {                  
                },
            });
        }
        
        $('#close').click(function(){
            Cancel()
          })
                var sessionId = '{{$session_id}}';
                var token =  '{{$token}}';
                var apiKey = '{{$api_key}}';
          
                // Handling all of our errors here by alerting them
                function handleError(error) {
                if (error) {
                  alert('errorssssss' + error.message);
                }
                }
          
                // (optional) add server code here
                initializeSession();
          
                function initializeSession() {
                var session = OT.initSession(apiKey, sessionId);
          
                // Subscribe to a newly created stream
                session.on('streamCreated', function(event) {
                  session.subscribe(event.stream, 'subscriber', {
                    insertMode: 'append',
                    width: '100%',
                    height: '100%',
                    showControls : true,
                    insertDefaultUI : true,
                    style: {
                        videoDisabledDisplayMode: 'on',
                    }
                  }, handleError);
                });
          
                // Create a publisher
                var publisher = OT.initPublisher('publisher', {
                  insertMode: 'append',
                  width: '100%',
                  height: '100%',
                  publishVideo:{{$publishVideo}}
                }, handleError);
          
                // Connect to the session
                session.connect(token, function(error) {
                  // If the connection is successful, initialize a publisher and publish to the session
                  if (error) {
                    handleError(error);
                  } else {
                    session.publish(publisher, handleError);
                  }
                });
                }
  </script>
		
	</body>

<!-- doccure/video-call.html  30 Nov 2019 04:12:18 GMT -->
</html>