
<button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#deleteModal77" class="mybtn" style="display: none"></button>
                
<div class="modal fade" id="deleteModal77" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="music" style="display:none"></div>
            </div>
            <div class="modal-body text-center">
                <h1>Incoming Video Call...</h1>
                <h4 id="caller"></h4>
                <!-- csrf token -->
                <a  onclick="return Cancel()" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                <a onclick="return Stop()" target="_blank" href="{{ url('doctor/call_me') }}" class="btn btn-success">Answer</a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
<script src="{{ asset('jquery/jquery.min.js')}}"></script>
<script>
    // jQuery.noConflict();
    // $(window).load(function(){
    //     $(".mybtn").trigger("click");
    // });

    function Cancel() {
        $('.music').html();
        $.ajax({
            type: "get",
            url: "{{ url('cancel_call') }}",
            success: function (response) {                  
            },
        });
    }



// var obj = null;
// var stop = false;

setInterval(Call, 1000);

  function Call() {
        $.ajax({
            type: "get",
            url: "{{ url('receive_call') }}",
            success: function (response) {
                if(response != 0){
                    console.log('calling')
                    $('.music').html('<audio controls autoplay> <source src="https://dl.prokerala.com/downloads/ringtones/files/mp3/vivo-y12-2020-ringtone-50494.mp3"  type="audio/mpeg"> </audio>');
                    $('#caller').text('From ' + response)
                    $(".mybtn").trigger("click");
                }                    
            },
        //   complete: function(response) {
        //         setTimeout(Call, 1000)
        //   }
        });
    };

        // if($('#time').val() == 1){
        //     clearTimeout(timer);
        // }


    // $(document).ready(function(){
    //     $('#table').DataTable( {
    //         stateSave: true
    //     } );
    // })
  
    // $.ajax({
    //   type: "get",
    //   url: "{{ url('patient/calling') }}",
    //   success: function (response) {
    //     $('#key').val(response.api_key)
    //     $('#session_id').val(response.session_id)
    //     $('#token').val(response.token)
    //     console.log(response)
    //     // alert((response))
            
    //   }
    // });
  
    // function callMe(){
    //     var sessionId = '1_MX40NjkxMDM2NH5-MTU5OTMwMzE1NzQ2NX5sajFtV1NabEFIZ2JlVzh0cWcvTnJ5S2J-fg';
    //     var token =  'T1==cGFydG5lcl9pZD00NjkxMDM2NCZzaWc9NjZhZWZjMzUxNmU3OWVkNTMzMWFjNzI3NmViNjliZTdiNDdmYWQ4NzpzZXNzaW9uX2lkPTFfTVg0ME5qa3hNRE0yTkg1LU1UVTVPVE13TXpFMU56UTJOWDVzYWpGdFYxTmFiRUZJWjJKbFZ6aDBjV2N2VG5KNVMySi1mZyZjcmVhdGVfdGltZT0xNTk5MzAzMTU4JnJvbGU9cHVibGlzaGVyJm5vbmNlPTE1OTkzMDMxNTguNDYwOTk4ODQwMTEwMiZpbml0aWFsX2xheW91dF9jbGFzc19saXN0PQ==';
    //     var apiKey = '46910364';
  
    //     // Handling all of our errors here by alerting them
    //     function handleError(error) {
    //     if (error) {
    //       alert('errorssssss' + error.message);
    //     }
    //     }
  
    //     // (optional) add server code here
    //     initializeSession();
  
    //     function initializeSession() {
    //     var session = OT.initSession(apiKey, sessionId);
  
    //     // Subscribe to a newly created stream
    //     session.on('streamCreated', function(event) {
    //       session.subscribe(event.stream, 'subscriber', {
    //         insertMode: 'append',
    //         width: '100%',
    //         height: '100%'
    //       }, handleError);
    //     });
  
    //     // Create a publisher
    //     var publisher = OT.initPublisher('publisher', {
    //       insertMode: 'append',
    //       width: '50%',
    //       height: '100%'
    //     }, handleError);
  
    //     // Connect to the session
    //     session.connect(token, function(error) {
    //       // If the connection is successful, initialize a publisher and publish to the session
    //       if (error) {
    //         handleError(error);
    //       } else {
    //         session.publish(publisher, handleError);
    //       }
    //     });
    //     }
    // }
    </script>