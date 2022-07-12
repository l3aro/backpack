<div class="h-full flex-auto flex justify-center flex-col">
    <x-slot name="metaTitle">{{ __('Home') }}</x-slot>
    <div class="flex justify-center items-center">
        <div class="w-3/4 md:w-2/3 mx-auto text-center z-10">
            <div class="w-48 h-48 mx-auto my-0 rounded-full bg-cover mb-6"
                style="background-image: url(assets/images/ava.jpg);"></div>
            <div class="desc">
                <h2 class="text-2xl text-gray-400 font-light mb-6">
                    {{ setting('portfolio_greeting') }} <span
                        class="font-black tracking-wider text-black/80 dark:text-white/80">Baro</span>
                </h2>

                <p class="mb-4 font-medium text-lg">
                    {{ setting('portfolio_intro') }}
                </p>
                {{-- <a href="#" class="text-neutral-400 border-b-2 border-b-neutral-400 text-lg">
                    More About Me
                </a> --}}
            </div>
        </div>
    </div>
</div>
