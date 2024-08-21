

<div class="card sidebar-card mb-3 shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title">Categories</h5>

        @foreach ($categories as $category )
             <!-- Category Item 1 -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="card-title mb-0">{{$category->name}}</h6> <!-- Category title -->
            <span class="badge badge-dark">{{$category->posts_count}}</span> <!-- Number of posts --> 
        </div>
        <!-- Separator with color -->
        <hr style="border-top: 1px solid #D3D3D3; margin-top: 6px; margin-bottom: 6px;">
        @endforeach
    </div>
</div>
