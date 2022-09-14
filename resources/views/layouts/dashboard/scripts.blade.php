  <!-- plugin for charts  -->
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}" async></script>
  <!-- plugin for scrollbar  -->
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
  <!-- github button -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- main script file  -->
  <script src="{{asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.3')}}" async></script>

  <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <script src="{{ asset('lightbox/js/lightbox-plus-jquery.min.js') }}"></script>

  <script>
    // allert time
    $(document).ready(function(){
        setTimeout(function() {
        $("#alert").fadeOut();               
        }, 2000);
    })
    </script>