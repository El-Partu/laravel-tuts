<x-layout>
    <x-slot:heading>
        <h1 class="text-lg">
        Job
        </h1>
    </x-slot:heading>
    <h1 class="text-lg "> {{$job->title}}</h1>
    <p class="mb-2">
   This job pays {{$job->salary}} per year.
    </p >
    @can('edit-job',$job)
    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    @endcan
</x-layout>
