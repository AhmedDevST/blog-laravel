 <!-- Search Card -->
 <div class="card sidebar-card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title">Search</h5>
        <form  method="GET" action="{{ route('home.search') }}">
        <input  name="query" type="text" class="form-control mb-2" placeholder="Search...">
        <button type="submit" class="btn btn-custom btn-block">Search</button>
        </form>
    </div>
</div>