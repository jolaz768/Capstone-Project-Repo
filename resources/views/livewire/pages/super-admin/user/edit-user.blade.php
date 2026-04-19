<div>
    {{-- In work, do what you enjoy. --}}
</div>
<div>
     @if (session()->has('message'))
        <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
        
    @endif
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mt-12 max-w-full mx-auto">
            <!-- Card -->
            <div class="flex flex-col border border-gray-200 rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">
                <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
                    Create User
                </h2>

                <form wire:submit.prevent="save">
                    <div class="grid gap-4 lg:gap-6">
                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-name"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Name</label>
                                <input wire:model.defer="name" type="text" name="hs-name" id="hs-name"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('name') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="hs-email"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Email</label>
                                <input wire:model.defer="email" type="email" name="hs-email" id="hs-email"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    @error('email') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror

                            </div>
                        </div>

                         <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-password"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Password</label>
                                <input wire:model.defer="password" type="password" name="hs-password" id="hs-password"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('password') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>

                            {{-- <div>
                                <label for="hs-password-confirmation"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Confirm Password</label>
                                <input wire:model.defer="password_confirmation" type="password" name="hs-password-confirmation" id="hs-password-confirmation"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div> --}}
                        </div>

                        <div class="mt-5">
                            <h2 class="mb-1 text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                Assign Role
                            </h2>

                        </div>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-2">
                            {{-- using forelse loop for show the roles in the table selected roles --}}
                            @forelse ($roles as $role)
                            <label wire:key="role-{{ $role->id }}" for="hs-checkbox-in-form-{{ $role->id }}" class="flex items-center p-3 w-full bg-layer border dark:border-neutral-700 border-layer-line rounded-lg text-sm focus:border-primary-focus focus:ring-primary-focus">
                                <input wire:model="selectedUserRole" type="checkbox" value="{{ $role->name }}" 
                                id="hs-checkbox-in-form-{{ $role->id }}" name="selectedUserRole" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" >
                                <span class="text-sm ms-3 text-muted-foreground-1 dark:text-amber-50">{{ $role->name }}</span>
                            </label>
                            @empty
                            <p class="text-gray-500 dark:text-gray-400">No roles available.</p>
                            @endforelse

                            @error('selectedUserRole') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                        </div>

                    </div>
                    <!-- End Grid -->

                    <div class="mt-6 grid">
                        <button type="submit"
                            class="w-50 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Save</button>
                    </div>

                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Contact Us -->
</div>
