<div>
    <!-- Card Section -->

    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
        <div class="bg-layer rounded-xl shadow-xs p-4 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-foreground">Profile</h2>
                <p class="text-sm text-muted-foreground-2">Manage your name, password and account settings.</p>
            </div>
                @if (session()->has('message'))
                <div class="mb-4 p-3 bg-green-layer text-green-400 text-sm rounded-lg shadow-2xs text-center
                    border border-green-400">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <!-- Profile photo -->
                    <div class="sm:col-span-3">
                        <label class="inline-block text-sm text-foreground mt-2.5">Profile photo</label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="flex items-center gap-5">
                            <!-- Avatar preview -->
                            <div class="shrink-0">
                                @if ($profile_image)
                                    <img class="inline-block size-16 rounded-full ring-2 ring-layer object-cover"
                                         src="{{ $profile_image->temporaryUrl() }}">
                                @elseif (Auth::user()->profile_image)
                                    <img class="inline-block size-16 rounded-full ring-2 ring-layer object-cover"
                                         src="{{ asset('storage/' . Auth::user()->profile_image) }}">
                                @else
                                    <span class="size-16 inline-flex items-center justify-center rounded-full bg-black text-white text-lg font-semibold uppercase ring-2 ring-layer">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                @endif
                            </div>

                            <div class="flex gap-x-2">
                                <!-- Hidden file input -->
                                <input type="file" wire:model="profile_image" id="profile-image-input" class="hidden" accept="image/*">

                                <button type="button"
                                        onclick="document.getElementById('profile-image-input').click()"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/>
                                    </svg>
                                    Upload photo
                                </button>

                                @if ($profile_image)
                                    <button type="button" wire:click="removePhoto"
                                            class="py-2 px-3 text-sm text-red-600 hover:underline">
                                        Remove
                                    </button>
                                @endif
                            </div>
                        </div>
                        @error('profile_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Full name -->
                    <div class="sm:col-span-3">
                        <label for="af-account-full-name" class="inline-block text-sm text-foreground mt-2.5">Full name</label>
                        <div class="hs-tooltip inline-block">
                            <svg class="hs-tooltip-toggle ms-1 inline-block size-3 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                            <span class="hs-tooltip-content ..." role="tooltip">Displayed on public forums</span>
                        </div>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="af-account-full-name" type="text" wire:model="name"
                               class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs rounded-lg text-foreground ...">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="sm:col-span-3">
                        <label for="af-account-email" class="inline-block text-sm text-foreground mt-2.5">Email</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="af-account-email" type="email" wire:model="email"
                               class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs rounded-lg ...">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div class="sm:col-span-3">
                        <label for="af-account-password" class="inline-block text-sm text-foreground mt-2.5">Password</label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="space-y-2">
                            <input type="password" wire:model="current_password"
                                   class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs rounded-lg ..."
                                   placeholder="Current password">
                            @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            <input type="password" wire:model="new_password"
                                   class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs rounded-lg ..."
                                   placeholder="New password">
                            @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            <input type="password" wire:model="new_password_confirmation"
                                   class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs rounded-lg ..."
                                   placeholder="Confirm new password">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="af-account-phone" class="inline-block text-sm text-foreground mt-2.5">Phone</label>
                            <span class="text-sm text-muted-foreground">(Optional)</span>
                        </div>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="af-account-phone" type="text" wire:model="phone"
                                   class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs ..."
                                   placeholder="+x(xxx)xxx-xx-xx">
                            <!-- The type select is only visual; you can add a phone_type column later -->
                            <select class="py-1.5 sm:py-2 px-3 pe-9 block w-full sm:w-auto bg-layer border-layer-line shadow-2xs ..." disabled>
                                <option>Mobile</option>
                            </select>
                        </div>
                        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Gender -->
                    <div class="sm:col-span-3">
                        <label class="inline-block text-sm text-foreground mt-2.5">Gender</label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <label class="flex items-center py-2 px-3 w-full bg-layer border border-layer-line ...">
                                <input type="radio" wire:model="gender" value="male"
                                       class="shrink-0 size-4 ...">
                                <span class="ms-3 text-sm">Male</span>
                            </label>
                            <label class="flex items-center py-2 px-3 w-full bg-layer border border-layer-line ...">
                                <input type="radio" wire:model="gender" value="female"
                                       class="shrink-0 size-4 ...">
                                <span class="ms-3 text-sm">Female</span>
                            </label>
                            <label class="flex items-center py-2 px-3 w-full bg-layer border border-layer-line ...">
                                <input type="radio" wire:model="gender" value="other"
                                       class="shrink-0 size-4 ...">
                                <span class="ms-3 text-sm">Other</span>
                            </label>
                        </div>
                        @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Bio -->
                    <div class="sm:col-span-3">
                        <label for="af-account-bio" class="inline-block text-sm text-foreground mt-2.5">BIO</label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea id="af-account-bio" wire:model="bio"
                                  class="py-1.5 sm:py-2 px-3 block w-full bg-layer border-layer-line shadow-2xs rounded-lg ..."
                                  rows="6" placeholder="Type your message..."></textarea>
                        @error('bio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                </div><!-- End Grid -->

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                            onclick="history.back()"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover">
                        Cancel
                    </button>
                    <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>