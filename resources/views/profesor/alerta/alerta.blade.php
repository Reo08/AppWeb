@if (session('alert'))
    <script>
        alert("{{session('alert')}}")
    </script>
@endif