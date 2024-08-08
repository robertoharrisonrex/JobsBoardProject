<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($jobs as $job)

            <a class="block px-4 py-6 border bg-white hover:bg-gray-50 border-gray-400 rounded-lg " href="/jobs/{{$job->id}}">
                <div>
                    <strong class="text-green-800">{{$job->employer->name ?? null}}</strong>
                </div>
                <div>
                    <strong class="text-gray-600">{{$job->title}}</strong>
                </div>
                <div>
                    <p>Salary: {{$job->salary}}</p>
                </div>
            </a>

        @endforeach
    </div>
    <div>
        {{$jobs->links()}}
    </div>
</x-layout>
