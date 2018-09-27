@extends ('partials.layout')

@section('content')
<div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
          Some blog name
        </h3>
        
        @foreach ($posts as $post)
            @include('posts.article')
        @endforeach

        <nav class="blog-pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

      </div><!-- /.blog-main -->
@endsection
