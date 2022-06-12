@extends('layouts.app')
@section('section')
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

<!-- ====== Cards Section Start -->
<section class="p-4 bg-[#F3F4F6]">
   <div class="container">
      <div class="flex flex-wrap -mx-4">
          @forelse ([1,2,3] as $vehicle)
            <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                <div class="bg-white rounded-lg overflow-hidden mb-10">
                    <img
                    src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg"
                    alt="image"
                    class="w-full"
                    />
                    <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                    <h3>
                        <a
                            href="javascript:void(0)"
                            class="
                            font-semibold
                            text-dark text-xl
                            sm:text-[22px]
                            md:text-xl
                            lg:text-[22px]
                            xl:text-xl
                            2xl:text-[22px]
                            mb-4
                            block
                            hover:text-primary
                            "
                            >
                        50+ Best creative website themes & templates
                        </a>
                    </h3>
                    <p class="text-base text-body-color leading-relaxed mb-7">
                        Lorem ipsum dolor sit amet pretium consectetur adipiscing
                        elit. Lorem consectetur adipiscing elit.
                    </p>
                    <a
                        href="javascript:void(0)"
                        class="
                        inline-block
                        py-2
                        px-7
                        border border-[#E5E7EB]
                        rounded-full
                        text-base text-body-color
                        font-medium
                        hover:border-primary hover:bg-primary hover:text-white
                        transition
                        "
                        >
                    View Details
                    </a>
                    </div>
                </div>
            </div>
          @empty
          <div class="flex bg-yellow-100 rounded-lg p-2 text-sm text-yellow-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
                </div>
            </div>
          @endforelse
      </div>
   </div>
</section>
<!-- ====== Cards Section End -->
@endsection