@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Proses Gagal.</strong> {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Proses Berhasil.</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@if (session('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Proses Gagal.</strong> {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif