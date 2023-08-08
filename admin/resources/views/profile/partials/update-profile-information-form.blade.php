<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
           <x-input-label for="ProfilePic" :value="__('Profile Picture')" />
           
           <!-- <x-text-input type="file" class="mt-1 block w-full" id="image" name="image" @error('image') is-invalid @enderror /> -->
           <input type="file" id="image" name="image" class="mt-1 block w-full"/>
        </div>   

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-text-input type="hidden" id="id" name="id" :value="old('name', $user->id)" autocomplete="id"  />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}
                       
                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="birthday" :value="__('Date Of Birth')" /> 
            <div class="flex">
                <x-text-input id="birthday" name="birthday" type="date" :value="old('birthday', date('Y-m-d', strtotime($user->birthday)))" onchange="getAge()" class="mt-1 block w-3/5" required autocomplete="username" />
                <div class="mt-2 block w-2/5" style="padding-left: 20px;padding-top: 8px;">Age : <span id='calage' > -- </span> </div>
                <x-input-error class="mt-2" :messages="$errors->get('dateofbirth')" />
            </div> 
        </div>
        <div>
            <x-input-label for="jobtitle" :value="__('Job Title')" /> 
            <div class="flex">
                <x-text-input id="user_job_title" name="user_job_title" :value="old('user_job_title', $user->user_job_title)" type="text" class="mt-1 block w-3/5" required autocomplete="Job Title" />
            </div> 
        </div>
        <div>
        <x-input-label for="contactnumber" :value="__('Contact Number')" /> 
            <x-text-input id="contact_number" name="contact_number" type="number" onchange="getAge()" class="mt-1 block w-full" :value="old('contact_number', $user->contact_number)"/>
            <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
