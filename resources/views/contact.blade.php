@extends('layouts/main')

@section('layoutTitle')
    Contact
@endsection

@section('layoutContent')
    <div class="text-gray-700">
        <div class="text-2xl font-semibold">Contact Me</div>
        <div class="text-lg mt-2 font-medium">
            Do not hesitate! I would be happy if you want to contact with me about articles, job oportunities or ideas you want to share.
        </div>
        <div class="flex flex-wrap justify-center mt-8">
            <div class="w-full sm:w-1/2 my-2 sm:pr-12">
                <div class="border-b-4 border-gray-700 pb-2 mb-4">
                    <div class="text-lg">Email:</div>
                    <div class="font-semibold">emre.uygur@outlook.com</div>
                </div>

                <div class="border-b-4 border-gray-700 pb-2 mb-4">
                    <div class="text-lg">Phone:</div>
                    <div class="font-semibold">+90 553 176 8018</div>
                </div>

                <div class="border-b-4 border-gray-700 pb-2 mb-4">
                    <div class="text-lg">Social Media</div>
                    <div class="flex">
                        <a href="https://github.com/emreuygur/" target="_blank" class="px-3 py-2 border border-gray-700 rounded bg-gray-700 text-gray-200 hover:text-gray-700 hover:bg-gray-200 mr-2">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/emre-uygur/" target="_blank" class="px-3 py-2 border border-gray-700 rounded bg-gray-700 text-gray-200 hover:text-gray-700 hover:bg-gray-200 mr-2">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://twitter.com/eemreuygur/" target="_blank" class="px-3 py-2 border border-gray-700 rounded bg-gray-700 text-gray-200 hover:text-gray-700 hover:bg-gray-200 mr-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 my-2 sm:pl-12">
                <form id="contact-form" method="POST" action="/contact">
                    @csrf
                    <div class="flex flex-col mb-2">
                        <div class="text-lg mb-1">Name</div>
                        <input type="text" name="name" value="{{ old('name') }}" class="border rounded border-gray-300 p-1 focus:border-blue-300">
                        @error("name")
                            <p class="text-sm text-red-500 font-semibold">
                                {{ $errors->first("name") }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class="text-lg mb-1">Email</div>
                        <input type="email" name="email" value="{{ old('email') }}" class="border rounded border-gray-300 p-1 focus:border-blue-300">
                        @error("email")
                            <p class="text-sm text-red-500 font-semibold">
                                {{ $errors->first("email") }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class="text-lg mb-1">Message</div>
                        <textarea name="message" class="border rounded border-gray-300 p-1 focus:border-blue-300 resize-none" rows="3">
                            {{ old('message') }}
                        </textarea>
                        @error("message")
                            <p class="text-sm text-red-500 font-semibold">
                                {{ $errors->first("message") }}
                            </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <button 
                            type="submit" 
                            class="px-2 py-1 bg-blue-600 text-white rounded g-recaptcha"
                            data-sitekey="6Lf73KUZAAAAAI-pLD0OWBUUudDBT2heRx2fge6X"
                            data-callback="onSubmit"
                            >Submit
                        </button>
                    </div>
                </form>
                @if(isset($successMsg))
                    <div class="font-semibold text-green-600">
                        {{ $successMsg }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function onSubmit(token) {
          document.getElementById("contact-form").submit();
        }
      </script>     
@endsection