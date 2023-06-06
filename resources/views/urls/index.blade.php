@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8 flex flex-col items-center">
        <h1 class="text-3xl mb-6">My URLs</h1>
        <a href="{{ route('urls.create') }}" class="inline-block btn btn-primary mb-6">Create URL</a>
        <div class="w-full">
            <table class="table-auto w-full mt-2">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Short URL</th>
                        <th class="px-4 py-2">Target URL</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($urls != null && count($urls) > 0)
                        @foreach ($urls as $url)
                            <tr>
                                <td class="border px-4 py-2"><a href="{{ url($url->short_url) }}" target="_blank">{{ url($url->short_url) }}</a></td>
                                <td class="border px-4 py-2"><a href="{{ $url->target_url }}" target="_blank">{{ $url->target_url }}</a></td>
                                <td class="border px-4 py-2 flex items-center justify-around">
                                    <a href="{{ route('urls.edit', $url) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Edit</a>
                                    <form action="{{ route('urls.destroy', $url) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">No URLs found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
