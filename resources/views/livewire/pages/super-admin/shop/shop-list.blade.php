<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div
      class="overflow-x-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
      <div class="min-w-full inline-block align-middle">
        <div class="bg-layer border border-layer-line rounded-xl shadow-2xs overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-table-line">
            <div>
              <h1 class="text-xl font-semibold text-foreground">
                Registered Shops
              </h1>
              <p class="text-sm text-muted-foreground-2">
                Manage Shops
              </p>

            </div>

            <div class="flex flex-col md:flex-row gap-3 items-center">

              <!-- Search Bar -->
              <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Search shops..."
                  class="py-2 ps-10 pe-4 block w-full md:w-64 border border-layer-line rounded-lg text-sm bg-layer text-foreground focus:border-primary focus:ring-primary">

                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-muted-foreground-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                  </svg>
                </div>
              </div>

              <!-- Buttons -->
              <div class="inline-flex gap-x-2">
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover"
                  href="#">
                  View all
                </a>

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover"
                  href="{{ route('super-admin.shop.create') }}">

                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                  </svg>
                  Add Tenant
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-table-line">
            <thead class="bg-muted">
              <tr>
                <th scope="col" class="ps-6 py-3 text-start">
                  {{-- <label for="hs-at-with-checkboxes-main" class="flex">
                    <input type="checkbox"
                      class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none"
                      id="hs-at-with-checkboxes-main">
                    <span class="sr-only">Checkbox</span>
                  </label> --}}
                </th>

                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Shop Owner Name
                    </span>
                  </div>
                </th>

                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Shop Name
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Description
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Status
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Shop Image
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Shop Logo
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Phone
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Address
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Created
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-table-line">

              @forelse ($this->shops as $skey => $userShop)
                <tr wire:key="shop-{{ $skey }}-{{ $userShop->id }}">
                  <td class="size-px whitespace-nowrap">
                    <div class="ps-6 py-3">
                      {{-- <label for="hs-at-with-checkboxes-1" class="flex">
                        <input type="checkbox"
                          class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none"
                          id="hs-at-with-checkboxes-1">
                        <span class="sr-only">Checkbox</span>
                      </label> --}}
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                      <div class="flex items-center gap-x-3">
                        <div class="grow">
                          <span class="block text-sm font-semibold text-foreground">{{ $userShop->user->name }}</span>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                      <div class="flex items-center gap-x-3">
                        <div class="grow">
                          <span
                            class="block text-sm font-semibold text-foreground">{{ $userShop->shop?->shop_name }}</span>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td class="h-px w-72 whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span
                        class="block text-sm font-semibold text-foreground">{{ Str::limit($userShop->shop?->description, 20) }}</span>

                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      @if($userShop->shop?->is_active)
                      <span
                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                          fill="currentColor" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        Active
                      </span>
                      @else
                      <span
                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                          fill="currentColor" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        Inactive
                      </span>
                      @endif
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <div class="flex items-center gap-x-3">
                        <img class="w-20 h-20 rounded-full" src="{{ asset('storage/' . $userShop->shop?->shop_image) }}"
                          alt="{{ $userShop->shop?->shop_name }}" />
                        <div class="flex w-full h-1.5 bg-surface-1 rounded-full overflow-hidden">
                          <div class="flex flex-col justify-center overflow-hidden bg-secondary" role="progressbar"
                            style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <img class="inline-block size-9.5 rounded-full"
                        src="{{ asset('storage/' . $userShop->shop?->shop_logo) }}"
                        alt="{{ $userShop->shop?->shop_name }}" />
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-muted-foreground-1">{{ $userShop->shop?->phone }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-muted-foreground-1">{{ $userShop->shop?->address }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span
                        class="text-sm text-muted-foreground-1">{{ $userShop->shop?->created_at?->format('m-d-Y') }}</span>
                    </div>
                  </td>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5">
                      <a class="inline-flex items-center gap-x-1 text-sm text-primary decoration-2 hover:underline focus:outline-hidden focus:underline font-medium"
                        href="{{ route('super-admin.shop.edit', $userShop->id) }}">
                        Edit
                      </a>
                    </div>

                  <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5">
                      <button wire:click="delete({{ $userShop->shop->id }})"
                        wire:confirm="Are you sure you want to delete this shop?" class="text-red-600 hover:text-red-800">
                        Delete
                      </button>
                    </div>
                  </td>
                  </td>
                </tr>
              @empty
                <span class="text-sm text-foreground text-center block">No Shops Found</span>
              @endforelse

            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-layer-line">
            <div>
              <p class="text-sm text-muted-foreground-2">
                <span class="font-semibold text-foreground">12</span> results
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <button type="button"
                  class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                  </svg>
                  Prev
                </button>

                <button type="button"
                  class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus">
                  Next
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->