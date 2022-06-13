<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block py-2 ml-3 px-7 border border-[#E5E7EB] rounded-full disabled:opacity-50 disabled:cursor-not-allowed text-base text-body-color font-medium hover:border-blue-400 bg-blue-400 text-white hover:bg-blue-500 transition']) }}>
    {{ $slot }}
</button>
