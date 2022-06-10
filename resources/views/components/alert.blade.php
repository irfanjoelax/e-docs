@if (session('alert-primary'))
<div class="alert alert-primary alert-dismissible show fade mb-4">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ session('alert-primary') }}
    </div>
</div>
@endif

@if (session('alert-secondary'))
<div class="alert alert-secondary alert-dismissible show fade mb-4">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ session('alert-secondary') }}
    </div>
</div>
@endif

@if (session('alert-success'))
<div class="alert alert-success alert-dismissible show fade mb-4">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ session('alert-success') }}
    </div>
</div>
@endif

@if (session('alert-warning'))
<div class="alert alert-warning alert-dismissible show fade mb-4">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ session('alert-warning') }}
    </div>
</div>
@endif

@if (session('alert-danger'))
<div class="alert alert-danger alert-dismissible show fade mb-4">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ session('alert-danger') }}
    </div>
</div>
@endif

@if (session('alert-info'))
<div class="alert alert-info alert-dismissible show fade mb-4">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ session('alert-info') }}
    </div>
</div>
@endif
