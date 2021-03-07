@if ('status')
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            text: '{{ session('status') }}',
            showConfirmButton: false,
            timer: 3000,
        });

    </script>
@endif
