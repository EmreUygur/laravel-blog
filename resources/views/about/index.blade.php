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
                        {{ $biography->biography }}
                    @else
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus fugiat explicabo. Dolores error unde porro aut, aspernatur quam consequatur, perspiciatis corporis eveniet, rerum eos vero ad nesciunt maiores nobis!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, placeat veniam voluptates repellendus accusantium tenetur dolor magnam est soluta corrupti. Vitae modi fugiat sunt nulla officiis est, ipsa magni accusamus.
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full lg:w-2/3 lg:pl-4 flex flex-col">
            <div class="pb-2 h-full">
                <div class="p-4 text-gray-700 rounded bg-white h-full">
                    <div class="text-2xl font-semibold select-none mb-2">Job Experiences</div>
                    <div class="jobs-list flex flex-col">
                        <div class="job flex-flex-col">
                            <div class="company-title text-xl font-medium">DOGO Tasarım</div>
                            <div class="font-normal text-gray-600 text-lg px-1">Front-end Developer</div>
                            <div class="font-normal text-gray-600 text-md px-1">02/2020 - 03/2020</div>
                        </div>

                        <div class="job flex-flex-col">
                            <div class="company-title text-xl font-medium">Lazermarket</div>
                            <div class="font-normal text-gray-600 text-lg px-1">Internship</div>
                            <div class="font-normal text-gray-600 text-md px-1">07/2018 - 08/2018</div>
                        </div>

                        <div class="job flex-flex-col">
                            <div class="company-title text-xl font-medium">Ankakep Bilişim</div>
                            <div class="texttext-gray-600 text-lg px-1">Internship</div>
                            <div class="text-gray-600 text-md px-1">06/2016 - 08/2016</div>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="pt-2 h-full">
                <div class="p-4 text-gray-700 rounded bg-white h-full">
                    <div class="text-2xl font-semibold select-none">Education</div>
                    <div class="educations-list flex flex-col">
                        <div class="school flex-flex-col">
                            <div class="school-title text-xl font-medium">Celal Bayar University</div>
                            <div class="text-gray-600 text-lg px-1">Computer Engineering</div>
                            <div class="text-gray-600 text-md px-1">09/2013 - 08/2019</div>
                            <div class="gda text-gray-600 text-sm px-1">2.97/4</div>
                        </div>

                        <div class="school flex-flex-col">
                            <div class="school-title text-xl font-medium">Polytechnic Institute of Coimbra</div>
                            <div class="text-gray-600 text-lg px-1">Front-end Developer</div>
                            <div class="text-gray-600 text-md px-1">09/2016 - 08/2017</div>
                            <div class="note text-gray-600 text-sm px-1">Erasmus Student Mobility</div>
                        </div>
                    </div>                         
                </div>
            </div>
        </div>
    </div>
@endsection