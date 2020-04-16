@extends('layouts/main')

@section('layoutTitle')
    Create Job
@endsection

@section('layoutContent')
    <div class="text-2xl font-semibold text-gray-700">Add A Work Experience</div>
    <form method="POST" action="/about/job">
        @csrf
        <div class="flex flex-col mt-6">
            <div class="m-2 flex flex-col">
                <label for="company">Company</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="company" name="company"/>
                @error('company')
                    <p class="text-danger">
                    {{ $errors->first('company') }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="position">Position</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="position" name="position" />
                @error('position')
                    <p class="text-danger">
                    {{ $errors->first('position') }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="started_at">Started At</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="started_at" name="started_at" />
                @error('started_at')
                    <p class="text-danger">
                    {{ $errors->first('started_at') }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="quitted_at">Quitted At</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="quitted_at" name="quitted_at" />
                @error('quitted_at')
                    <p class="text-danger">
                    {{ $errors->first('quitted_at') }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="note">Additional Notes</label>
                <textarea class="border rounded border-gray-200 p-1 focus:border-blue-200 resize-none" id="note" name="note" rows="3"></textarea>
                @error('note')
                    <p class="text-danger">
                    {{ $errors->first('note') }}
                    </p>
                @enderror
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Submit</button>
            </div>
        </div>
    </form>
@endsection