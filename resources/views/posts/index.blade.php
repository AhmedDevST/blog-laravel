   @extends('layoutes.app')
   @section('title', 'index')
   @section('content')
       <!-- Main Content -->

       <!-- Centered Button -->
       <div class="row justify-content-center ">
           <a href="{{ route('posts.create') }}" class="btn btn-success w-25">Create</a>
       </div>
       <!-- Table at the bottom -->
       <div class="row mt-5">
           <table class="table table-striped">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>Title </th>
                       <th>Posted by</th>
                       <th>Created At</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>

                   @forelse ($posts as $post)
                       <tr>
                           <td>{{ $post->id }}</td>
                           <td>{{ $post->title }}</td>
                           <td>{{ $post->user->name }}</td>
                           <td>{{ $post->created_at->format('Y-m-d') }}</td>
                           <td>
                               <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-md">View </a>
                               <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-md">Edit</a>
                               <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="btn btn-danger btn-md"
                                       onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                               </form>
                           </td>
                       </tr>
                   @empty
                       <tr>
                           <td colspan="5" class="text-center">No posts available</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>


    <!-- Pagination Links  -->
           <div class="d-flex justify-content-center mt-4">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
       
           <!-- Pagination Links ( add some code to App\Providers\AppServiceProvider) -->
           <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
       </div>
   @endsection
