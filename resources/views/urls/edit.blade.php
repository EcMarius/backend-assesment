@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit URL</h1>
        <form action="{{ route('urls.update', $url) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="short_url" class="block text-gray-700 font-bold mb-2">Short URL:</label>
                <input type="text" id="short_url" name="short_url" value="{{ $url->short_url }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('short_url')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="target_url" class="block text-gray-700 font-bold mb-2">Target URL:</label>
                <input type="text" id="target_url" name="target_url" value="{{ $url->target_url }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('target_url')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                <a href="{{ route('urls.index') }}" class="text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection
