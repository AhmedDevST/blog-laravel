<div class="card sidebar-card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title">Authors</h5>
        @foreach ($editors as $editor )
        <div class="card">
            <div class="row g-0">
                <!-- Author Image -->
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $editor->image) }}" class="img-fluid rounded-start" alt="">
                </div>
                <!-- Author Details -->
                <div class="col-md-8">
                    <div class="card-body p-2"> <!-- Adjust padding -->
                        <h6 class="card-title">{{$editor->name}}</h6>
                        <p class="card-text">{{$editor->email}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #D3D3D3; margin-top: 5px; margin-bottom: 5px;"> <!-- Adjust margin -->
        @endforeach
    </div>
</div>
