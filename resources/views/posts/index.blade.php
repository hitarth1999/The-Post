@extends('layouts.app', ['title' => $post->title])

@section('content')
<div class="relative flex items-top justify-center sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @auth
            @if(Auth::user()->id == $post->author_id)
                <div class="flex">
                    <a href="{{route('post.edit',['post' => encrypt($post->id)])}}" class="px-4 py-2 mr-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Edit Post">Edit Post</a>
                    @if($post->comments->count() == 0)
                    <form action="{{route('post.destroy',['post' => encrypt($post->id)])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Delete Post">Delete Post</button>
                    </form>
                    @endif
                </div>
            @endif
        @endauth
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1">
                <div class="p-6 border-t border-gray-200 border-t-0 border-l">
                    <div class="grid grid-cols-1">
                        <div class="p-3 pb-0 text-lg leading-7 font-semibold underline text-gray-900">{{$post->title}}</div>
                        <div class="p-3 pt-0 text-sm font-thin text-black">By {{$post->user->name}}</div>
                    </div>

                    <div class="p-3 pt-0">
                        <div class="text-gray-600 text-sm post-desc">
                            {!!$post->description!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
