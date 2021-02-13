{{-- @if ('status')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif --}}

@if ('status')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })

    </script>
@endif
@if ('status')
    <script>
        Swal.fire(
            'The Internet?',
            'That thing is still around?',
            'question'
        )

    </script>
@endif
