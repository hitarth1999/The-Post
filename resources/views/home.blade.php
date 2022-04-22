@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @forelse ($posts as $post)
            <div class="card mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" onclick="redirect(this)" data-post="{{route('post.index',['post' => encrypt($post->id)])}}">
                <div class="grid grid-cols-1">
                    <div class="p-6 border-t border-gray-200 border-t-0 border-l">
                        <div class="grid grid-cols-1">
                            <div class="p-3 pb-0 text-lg leading-7 font-semibold underline text-gray-900">{{$post->title}}</div>
                            <div class="p-3 pt-0 text-sm font-thin text-black">By {{$post->user->name}}</div>
                        </div>

                        <div class="p-3 pt-0">
                            <div class="text-gray-600 text-sm">
                                {!!short_string($post->description, 300, 'read more')!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            No Post Found.
        @endforelse
        <div class="mt-8">
            {{ $posts->links('pagination::simple-tailwind') }}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function redirect(obj){
        window.location.href = obj.getAttribute('data-post');
    }
</script>
@endsection