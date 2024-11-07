<footer class="absolute z-50 bottom-0 left-0 w-full text-center text-white ">
    <P class="pt-2">
        © 2024 UrgenceSAMU
    </P>
</footer>


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
{{-- <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
{{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
{{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

<!-- Core plugin JavaScript-->
{{-- <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>;
    var module = {};
</script>
<script type="module">
    import Echo from '{{ asset('js/demo/echo.js') }}'

    import {
        Pusher
    } from '{{ asset('js/demo/pusher.js') }}'
    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: "pusher",
        key: "gmtlglaksbchlik19thp",
        wsHost: window.location.hostname,
        wsPort: 9000,
        forceTLS: false,
        disableStats: true,
        enabledTransports: ["ws"],
    });

    function setBg () {
        let randomColor = Math.floor(Math.random() * 16777215).toString(16);
        if (randomColor == "ffffff") {
            randomColor = Math.floor(Math.random() * 16777215).toString(16);
        }
        return randomColor
    }
    $(document).ready(function() {

        function refreshData() {

            const wesPromiseMission = fetch("/api/load-message");
            wesPromiseMission.then((response) => {
                return response.json();
            }).then(function(data) {
                console.log(data)
                
                $.each(data, (index, val) => {
                    $('#MessageSentContent').append('<div>  <span  style="color: #' + setBg() +  '; font-weight: bold;">' + val.pseudo + ': </span>'  + val.text + '</div>');
                })
            })

            window.Echo.channel('chat.1').listen('MessageSent', (e) => {
                //     console.log("event received")
                //     console.log(e)
                $('#MessageSentContent').append('<div> <span style="color:' + setBg() +  '">' + e.message.pseudo + ':</span>'  + e.message.text + '</div>');
            })
            const messagesContainer = document.getElementById("messagesContainer");
            messagesContainer.scrollTop = messagesContainer
                .scrollHeight;
            console.log(messagesContainer.scrollTop)
            console.log(messagesContainer.scrollHeight)

        }

        // // Appeler la fonction de rafraîchissement initialement
        refreshData();

        // // Appeler la fonction de rafraîchissement régulièrement (exemple toutes les 5 secondes)
        // setInterval(refreshData, 5000);
        $('#chat-form').on('submit', (e) => {
            e.preventDefault();
            // var txt = $("#message-input").val();
            // $.post("/admin/api/send-message", {text: txt},  function(data, status) {
            //     alert("Data: " + data + "\nStatus: " + status);
            // });
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: `/api/send-message-user`, // Replace with the target API URL
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    "text": $('#message-input').val()
                },
                dataType: "json",
                success: function(response) {
                    // console.log('Data posted successfully:', response);
                    // Process the response data
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error posting data:', textStatus, errorThrown);
                    alert('Erreur de connexion')
                    // Handle errors
                }
            });
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('.show-event').on('click', function() {
            let name = $(this).attr('name');
            let expendEvent = document.getElementById(name);
            // $(name).attr('hidden', 'false');
            // alert(expendEvent.innerHTML)
            expendEvent.hidden = false;
        });
        $('.close-modal-button').on('click', function() {
            $('.expend-modal').attr('hidden', true)
        });
        $('.check-spc').on('click', function(e) {
            let name = $(this).attr('name');
            const checkSpc = document.querySelectorAll('.check-spc');
            checkSpc.forEach(element => {
             if (element.name != name) {
                element.classList.remove('shadow-xl');
                element.classList.replace('border-purple-400', 'border-white');
             }else{
                element.classList.add('shadow-xl');
                element.classList.replace('border-white', 'border-purple-400');
             }
            });
            let bannerClan = document.getElementById("banner_clan");
            bannerClan.value = name;
        });
        $('.check-spc-2').on('click', function(e) {
            let name = $(this).attr('name');
            const checkSpc = document.querySelectorAll('.check-spc-2');
            checkSpc.forEach(element => {
             if (element.name != name) {
                element.classList.remove('shadow-xl');
                element.classList.replace('border-blue-400', 'border-white');
             }else{
                element.classList.add('shadow-xl');
                element.classList.replace('border-white', 'border-blue-400');
             }
            });
            let chackInput = document.getElementById("check-input");
            chackInput.value = name;
        });
    })
 
</script>
