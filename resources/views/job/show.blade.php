<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1 class="text-lg mb-4 font-bold" >Jobs Board</h1>

    <div class="  bg-white p-5 rounded-lg border border-gray-400 ">


    <h2><strong>Title:</strong> {{$job['title']}}</h2>
    <p><strong>Salary:</strong> {{$job['salary']}}</p>

    </div>
    <div class="mt-10">
        <x-general-link href="/jobs">Back</x-general-link>
        @can('edit', $job)
        <x-general-link href="/jobs/edit/{{$job->id}}">Edit</x-general-link>
        @endcan
        @can('delete', $job)
        <x-general-button-delete form="delete" >Delete</x-general-button-delete>
        @endcan
    </div>

    <form method="POST" id="delete" action="/jobs/delete/{{$job->id}}">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
