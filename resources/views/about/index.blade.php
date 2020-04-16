@extends('layouts/main')

@section('layoutTitle')
    About Me
@endsection

@section('layoutContent')
    <div class="flex flex-wrap justify-center items-stretch z-10">
        <div class="w-full pb-4 lg:w-1/3 lg:pr-4 lg:pb-0">
            <div class="p-4 text-gray-700 w-full h-full rounded bg-white">
                <div class="text-2xl font-semibold select-none">>_whoami</div>
                <div>
                    @if ($biography)
                        {!! $biography->biography !!}
                    @else
                        Biography is not entered yet...
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full lg:w-2/3 lg:pl-4 flex flex-col">
            <div class="pb-2 h-full">
                <div class="p-4 text-gray-700 rounded bg-white h-full">
                    <div class="text-2xl font-semibold select-none mb-2">Job Experiences</div>
                    <div class="jobs-list flex flex-col">
                        @if (count($jobs))
                            @foreach ($jobs as $job)
                                <div class="job flex-flex-col">
                                    <div class="company-title text-xl font-medium">{{ $job->company }}</div>
                                    <div class="font-normal text-gray-600 text-lg px-1">{{ $job->position }}</div>
                                    <div class="font-normal text-gray-600 text-md px-1">{{ $job->started_at }} - {{ $job->quitted_at }}</div>
                                </div>
                            @endforeach
                        @else 
                            No working experience information entered yet...
                        @endif
                    </div>                
                </div>
            </div>
            <div class="pt-2 h-full">
                <div class="p-4 text-gray-700 rounded bg-white h-full">
                    <div class="text-2xl font-semibold select-none">Education</div>
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
                                </div>
                            @endforeach
                        @else 
                            No educational information entered yet...
                        @endif
                    </div>                         
                </div>
            </div>
        </div>
    </div>
@endsection