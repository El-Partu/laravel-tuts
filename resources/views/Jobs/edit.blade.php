<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<x-layout>
    <x-slot:heading>
        <h1 class="font-bold text-4xl">Edit Job:{{ $job->title }}</h1>
    </x-slot:heading>
<form method="POST" action="/jobs/{{ $job->id }}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <x-form-label for="title">Title</x-form-label>
            <div class="mt-2">
            <x-form-input
            type="text"
            name="title"
            id="title"
            placeholder="Shelf dealer"
            value="{{ $job->title}}"
            required
            />
            </div>
            </div>
            <x-form-error name="title"/>

          </div>
          <div class="sm:col-span-4">
            <x-form-label for="salary">Salary</x-form-label>
            <div class="mt-2">
                <x-form-input
                type="text"
                name="salary"
                id="salary"
                placeholder="$50,000"
                value="{{ $job->salary }}"
                required
               />
              </div>
            </div>
            <x-form-error name="salary"/>
          </div>
        </div>

      </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">

      <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
</x-layout>

