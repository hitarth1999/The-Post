@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1">
                <div class="p-6 border-t border-gray-200 border-t-0 border-l">
                    <div class="grid grid-cols-1">
                        <div class="p-3 pb-0 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900">{{$post->title}}</a></div>
                        <div class="p-3 pt-0 text-sm font-thin text-black">By {{$post->user->name}}</div>
                    </div>

                    <div class="p-3 pt-0">
                        <div class="text-gray-600 text-sm">
                            {!!$post->description!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
