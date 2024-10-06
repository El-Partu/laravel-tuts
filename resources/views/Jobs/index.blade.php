<x-layout>
    <x-slot:heading>
        <h1 class="font-bold text-4xl">
            Jobs Page
        </h1>
    </x-slot:heading>

    <ul class="space-y-4">
        @foreach ($jobs as $job )
        <a href="/jobs/{{$job['id']}}" class="pt-4 px-2 block pb-2 rounded-lg border border-gray-400">
                <span class="text-blue-800 text-xl">{{$job->employer->name}}</span>
                <li> <strong>{{$job['title']}}</strong>: is paid {{$job['salary']}} per year.</li>
            </a>
         @endforeach
<div>{{$jobs->links()}}</div>
    </ul>
</x-layout>
