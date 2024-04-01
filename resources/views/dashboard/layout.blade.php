<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=1000, initial-scale=1">
        <title>Travelio - dashboard</title>
        <!--=============== Bootstrap css ===============-->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!--=============== fontAwesome css ===============-->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Owl carousel style sheet -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <!-- Owl carousel themes default -->
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <!-- Medium editor css file   -->
        <link href="{{ asset('css/editor-style.css') }}" rel="stylesheet">   

        <!--=============== style css ===============-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link rel="icon" href="{{env('APP_URL')}}/imgs/logo-en.png" type="image/jpeg" sizes="16x16">

        

    </head>
    <body>

        <!--========== Start contentWrapper ==========-->
        <section class="contentWrapper">
            
            <div class="contentWrapper__menu bg-yellow">
            
                <div class="contentWrapper__menu__logo">
                    <img src="{{env('APP_URL')}}/imgs/logo-en.png" alt="logo">
                </div>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('cities') }}" class="cap-case"> <i class="fa fa-map-pin"></i> Cities </a>
                    </li>
                    <li>
                        <a href="{{ route('amenities') }}" class="cap-case"> <i class="fa fa-glass"></i> Amenities </a>
                    </li>
                    <li>
                        <a href="{{ route('hotels') }}" class="cap-case"> <i class="fa fa-building"></i> Hotels </a>
                    </li>
                </ul>
            </div>

            <div class="contentWrapper__right">

                <div class="contentWrapper__right__head">
                    @yield('header')
                </div>

                <section class="contentWrapper__cover"><!--Start contentWrapper__cover-->
                    @yield('content')
                </section><!--End contentWrapper__cover-->

            </div>

        </section>
        <!--========== End contentWrapper ==========-->

        <!--========== jQuery library ==========-->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!--========== bootstrap js ==========-->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Editor JS -->
        <script src="{{ asset('js/editor-js.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            function add(){
                var new_chq_no = parseInt($('#total_chq').val())+1;
                var new_input=" <label class='cap-case'>Room Type</label><input type='text' name='room_type[]' class='form-control' id='new_"+new_chq_no+"' >";
                var second_input=" <label class='cap-case'>Number Of Rooms</label><input type='number' name='number[]' class='form-control' id='new_"+new_chq_no+"' >";
                
               
                $('#new_chq').append(new_input);
                $('#new_chq').append(second_input);
                $('#total_chq').val(new_chq_no);
            }
            
            function remove(){
                var last_chq_no = $('#total_chq').val();
                if(last_chq_no>1){
                    $('#new_'+last_chq_no).remove();
                    $('#total_chq').val(last_chq_no-1);
                }
            }

            function showDescription() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    </body>
</html>