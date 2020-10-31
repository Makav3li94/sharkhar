@if(!auth()->guard()->check() && !auth()->guard('buyer')->check())
    @php $bib = 'bib' @endphp
    @include('header')
    <style>
        header {
            background-color: #405de6;
        }

        .header_area .top-header .navbar {
            box-shadow: none;
            margin-bottom: 0;
            min-height: 30px;
            padding: .5rem 1rem !important;
        }
        .header_area .navbar{
            box-shadow: none;
            margin-bottom: 0;
        }

        .header_area  .navbar-brand{
            border-bottom: none;
        }
    </style>
    @include('login-modal')

    <script>
        @if($errors->has('mobile') || $errors->has('password'))
        $('#colorModal').modal('show');
        @endif
    </script>
@else
    @include('layouts.seller_includes.right_sidabar')
@endif