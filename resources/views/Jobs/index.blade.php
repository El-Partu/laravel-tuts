<x-layout>
    <x-slot:heading>
        <h1 class="font-bold text-4xl">
            Jobs Page
        </h1>
    </x-slot:heading>

    <ul class="space-y-4">
        @foreach ($jobs as $job )
        <div class="flex justify-between px-4 border border-gray-400 rounded-lg">
            <a href="/jobs/{{$job['id']}}" class="pt-4 px-2 block pb-2  ">
                <span class="text-blue-800 text-xl">{{$job->employer->name}}</span>
                <li> <strong>{{$job->title}}</strong>: is paid {{$job->salary}} per year.</li>
            </a>
            <form method="POST" action="/jobs/{{ $job->id }}" class="hidden" id="delete-form" >
                @csrf
                @method('DELETE')
            </form>
            <button type="submit" form="delete-form" class="text-red-500 font-semibold text-sm">Delete Job</button>
        </div>

         @endforeach
<div>{{$jobs->links()}}</div>
    </ul>
</x-layout>




