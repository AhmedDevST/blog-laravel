   @extends('layouts.app')
   @section('title', 'index')
   @section('content')
       @include('partials.flashBag')
       @role(['Admin', 'Editor'])
           <!-- Centered Button -->
           <div class="row justify-content-center ">
               <a href="{{ route('posts.create') }}" class="btn btn-success w-25">Create</a>
           </div>
       @endrole

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
                               @can('update', $post)
                                   <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-md">Edit</a>
                               @endcan
                               @can('delete', $post)
                                   <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                                       @csrf
                                       @method('delete')
                                       <button type="submit" class="btn btn-danger btn-md"
                                           onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                   </form>
                               @endcan
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
              {{ $posts->appends(['paramSearch' => $searchTerm])->links('pagination::bootstrap-4') }}
       </div>
   @endsection
