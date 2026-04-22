<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-layer border border-layer-line rounded-xl shadow-2xs overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-table-line">
            <!-- Input -->
            <div class="sm:col-span-1">
              <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
              <div class="relative">
                <input type="text" id="hs-as-table-product-review-search" name="hs-as-table-product-review-search" class="py-2 px-3 ps-11 block w-full bg-layer border-layer-line rounded-lg text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                  <svg class="shrink-0 size-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
              </div>
            </div>
            <!-- End Input -->

            <div class="sm:col-span-2 md:grow">
              <div class="flex justify-end gap-x-2">
                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                    <a href="{{ route('admin.shop.create') }}">
                  <button id="hs-as-table-table-export-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    Add Shop
                  </button>
                    </a>
                </div>

                <div class="hs-dropdown [--placement:bottom-right] relative inline-block" data-hs-dropdown-auto-close="inside">
                  <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                    Filter
                    <span class="ps-2 text-xs font-semibold text-primary border-s border-line-2">
                      1
                    </span>
                  </button>
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-48 z-10 bg-dropdown border border-dropdown-line divide-y divide-dropdown-divider shadow-md rounded-lg mt-2" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                    <div class="divide-y divide-dropdown-divider">
                      <label for="hs-as-filters-dropdown-all" class="flex items-center py-2.5 px-3">
                        <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-as-filters-dropdown-all" checked>
                        <span class="ms-3 text-sm text-foreground">All</span>
                      </label>
                      <label for="hs-as-filters-dropdown-published" class="flex items-center py-2.5 px-3">
                        <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-as-filters-dropdown-published">
                        <span class="ms-3 text-sm text-foreground">Active</span>
                      </label>
                      <label for="hs-as-filters-dropdown-pending" class="flex items-center py-2.5 px-3">
                        <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-as-filters-dropdown-pending">
                        <span class="ms-3 text-sm text-foreground">Deactive</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-table-line">
            <thead class="bg-muted">
              <tr>
                 <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Shop_ID
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
                      Address
                    </span>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Contanct Number
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
              </tr>
            </thead>

            <tbody class="divide-y divide-table-line">
              <tr class="bg-layer hover:bg-layer-hover">
                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <div class="flex items-center gap-x-4">
                      
                      <div>
                        <span class="block text-sm font-semibold text-foreground">1</span>
                      </div>
                    </div>
                  </a>
                </td>

                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <div class="flex items-center gap-x-3">
                      <img class="shrink-0 size-18 rounded-lg" src="https://images.unsplash.com/photo-1572307480813-ceb0e59d8325?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=320&q=80" alt="Product Image">
                      <div class="grow">
                      </div>
                    </div>
                  </a>
                </td>

                 <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <div class="flex items-center gap-x-3">
                      <img class="inline-block size-9.5 rounded-full" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Product Image">
                      <div class="grow">
                      </div>
                    </div>
                  </a>
                </td>

                <td class="h-px w-72 min-w-72 align-top">
                  <a class="block p-6" href="#">
                    <span class="block text-sm font-semibold text-foreground">Cedrecky tailoring</span>
                  </a>
                </td>

                <td class="h-px w-72 min-w-72 align-top">
                  <a class="block p-6" href="#">    
                    <span class="block text-sm text-muted-foreground-1">I bought this hat for my boyfriend, but then i found out he cheated on me so I kept it and I love it!! I wear it all the time and there is no problem with the fit even though its a mens" hat.</span>
                  </a>
                </td>

                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <span class="text-sm text-muted-foreground-2">Laguna, Batangas</span>
                  </a>
                </td>
                
                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <span class="text-sm text-muted-foreground-2">09519702937</span>
                  </a>
                </td>
                


                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                      Active
                    </span>
                  </a>
                </td>

                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-500/10 dark:text-blue-500">
                      Edit
                    </span>
                  </a>
                </td>

                <td class="size-px whitespace-nowrap align-top">
                  <a class="block p-6" href="#">
                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                      Delete
                    </span>
                  </a>
                </td>

                
              </tr>


            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-table-line">
            <div class="max-w-sm space-y-3">
              <select class="py-2 px-3 pe-9 block bg-layer border-layer-line text-layer-foreground rounded-lg text-sm focus:border-primary-focus focus:ring-primary-focus">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option selected>5</option>
                <option>6</option>
              </select>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                  Prev
                </button>

                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none">
                  Next
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
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
</div>
