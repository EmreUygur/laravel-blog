@extends('layouts/main')

@section('layoutTitle')
    Edit Education
@endsection

@section('layoutContent')
    <div class="text-2xl font-semibold text-gray-700">Edit Your Education</div>
    <form method="POST" action="/about/education/{{ $education->id }}">
        @csrf
        @method('PUT')
        <div class="flex flex-col mt-6">
            <div class="m-2 flex flex-col">
                <label for="school_name">School Name</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="school_name" name="school_name" value="{{ $education->school_name }}" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="department_name">Department Name</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="department_name" name="department_name" value="{{ $education->department_name }}" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="gpa">GPA</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="gpa" name="gpa" value="{{ $education->gpa ? $education->gpa : '' }}" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="startedAt">Started At</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="started_at" name="started_at" value="{{ $education->started_at }}" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="finishedAt">Finished At</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="finished_at" name="finished_at" value="{{ $education->finished_at }}" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="note">Additional Notes</label>
                <textarea name="note" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="note" rows="3">
                    {{ $education->note ? $education->note : '' }}
                </textarea>
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Submit</button>
            </div>
        </div>
    </form>
@endsection