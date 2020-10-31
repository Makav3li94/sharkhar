@if(!auth()->guard()->check() && !auth()->guard('buyer')->check())
    @php $bib = 'bib' @endphp
    @include('login-modal')

    @include('footer')

    <script>
        @if($errors->has('mobile') || $errors->has('password'))
        $('#colorModal').modal('show');
        @endif
    </script>
@endif