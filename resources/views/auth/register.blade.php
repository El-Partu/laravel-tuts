<x-layout>
    <x-slot:heading>
        <h1 class="font-bold text-4xl">Register</h1>
    </x-slot:heading>
<form method="POST" action="/register">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900 ">Create An Account</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <x-form-label for="title">Name</x-form-label>
            <div class="mt-2">
            <x-form-input
            type="text"
            name="name"
            id="name" value="{{ old('name') }}"
            required
            />
            </div>
            <x-form-error name="name"/>

          </div>
          <div class="sm:col-span-4">
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
                <x-form-input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
               />
            </div>
           <x-form-error name="email"/>
          </div>
          <div class="sm:col-span-4">
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
                <x-form-input
                type="password"
                name="password"
                id="password"
                value="{{ old('password') }}"
                required
               />
            </div>
           <x-form-error name="password"/>
          </div>
          <div class="sm:col-span-4">
            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
            <div class="mt-2">
                <x-form-input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                value="{{ old('password_confirmation') }}"
                required
               />
            </div>
           <x-form-error name="password_confirmation"/>
          </div>
        </div>

      </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
    </div>
  </form>
</x-layout>

