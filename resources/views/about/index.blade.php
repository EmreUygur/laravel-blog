@extends('layouts/main')

@section('layoutTitle')
    About Me
@endsection

@section('layoutContent')
    <div class="flex flex-wrap justify-center items-stretch z-10">
        <div class="w-full pb-4 lg:w-1/3 lg:pr-4 lg:pb-0">
            <div class="p-4 text-gray-700 w-full h-full rounded bg-white relative">
                <div class="flex justify-start items-end mb-3">
                    <img class="w-1/4 rounded-full mr-2" draggable="false" src="{{ asset('images/avatar.jpg') }}" alt="avatar">
                    <div class="text-2xl font-semibold select-none"><i class="fas fa-terminal"></i> whoami</div>
                </div>
                <div class="mb-12">
                    @if ($biography)
                        {!! $biography->biography !!}
                        @auth
                            <div class="mt-2 py-2 px-4 border-t border-gray-200 absolute inset-x-0 bottom-0">
                                <a href="/about/biography/edit" class="text-sm text-blue-400 hover:underline">Edit</a>
                            </div>
                        @endauth
                    @else
                        <div class="h-16">
                            Biography is not entered yet...
                        </div>
                        @auth
                            <div class="mt-2 py-2 px-4 border-t border-gray-200 absolute inset-x-0 bottom-0">
                                <a href="/about/biography/create" class="text-sm text-blue-400 hover:underline">Create your biography</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full lg:w-2/3 lg:pl-4 flex flex-col">
            <div class="pb-2 h-full">
                <div class="p-4 text-gray-700 rounded bg-white h-full">
                    <div class="flex select-none mb-2 flex items-center justify-between">
                        <div class="text-2xl font-semibold ">
                            <i class="fas fa-briefcase"></i> Job Experiences
                        </div>
                        @auth
                            <div class="text-sm">
                                <a href="/about/job/create" class="text-sm text-blue-400 hover:underline">Add</a>
                            </div>
                        @endauth
                    </div>
                    <div class="jobs-list flex flex-col">
                        @if (count($jobs))
                            @foreach ($jobs as $job)
                                <div class="job flex-flex-col">
                                    <div class="company-title text-xl font-medium">{{ $job->company }}</div>
                                    <div class="font-normal text-gray-600 text-lg px-1">{{ $job->position }}</div>
                                    <div class="font-normal text-gray-600 text-md px-1">{{ $job->started_at }} - {{ $job->quitted_at }}</div>
                                    @auth
                                        <div class="flex flex-row px-1">
                                            <div class="mr-2">
                                                <a href="/about/job/{{ $job->id }}/edit" class="text-sm text-blue-400 hover:underline">Edit</a>
                                            </div>
                                            <div>
                                                <form action="/about/job/{{ $job->id }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="text-sm text-blue-400 hover:underline">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            @endforeach
                        @else
                            <div class="h-16">
                                No working experience information entered yet...
                            </div>
                        @endif
                    </div>                
                </div>
            </div>
            <div class="pt-2 h-full">
                <div class="p-4 text-gray-700 rounded bg-white h-full">
                    <div class="flex select-none mb-2 flex items-center justify-between">
                        <div class="text-2xl font-semibold">
                            <i class="fas fa-graduation-cap"></i> Education
                        </div>
                        @auth
                            <div class="text-sm">
                                <a href="/about/job/create" class="text-sm text-blue-400 hover:underline">Add</a>
                            </div>
                        @endauth
                    </div>
                    <div class="educations-list flex flex-col">
                        @if (count($educations))
                            @foreach ($educations as $education)
                                <div class="school flex-flex-col">
                                    <div class="school-title text-xl font-medium">{{ $education->school_name }}</div>
                                    <div class="text-gray-600 text-lg px-1">{{ $education->department_name }}</div>
                                    <div class="text-gray-600 text-md px-1">{{ $education->started_at }} - {{ $education->finished_at }}</div>
                                    @if($education->gpa)
                                        <div class="gda text-gray-600 text-sm px-1">{{ $education->gpa }}</div>
                                    @endif
                                    @if($education->note)
                                        <div class="gda text-gray-600 text-sm px-1">{{ $education->note }}</div>
                                    @endif
                                    @auth
                                        <div class="flex flex-row px-1">
                                            <div class="mr-2">
                                                <a href="/about/education/{{ $education->id }}/edit" class="text-sm text-blue-400 hover:underline">Edit</a>
                                            </div>
                                            <div>
                                                <form action="/about/education/{{ $education->id }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="text-sm text-blue-400 hover:underline">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            @endforeach
                        @else
                            <div class="h-16">
                                No educational information entered yet...
                            </div>
                        @endif
                        {{-- @auth
                            <div class="mt-2 py-2 px-4 border-t border-gray-200 absolute inset-x-0 bottom-0">
                                <a href="/about/education/create" class="text-sm text-blue-400 hover:underline">Add educational information</a>
                            </div>
                        @endauth --}}
                    </div>                         
                </div>
            </div>
        </div>
    </div>
@endsection