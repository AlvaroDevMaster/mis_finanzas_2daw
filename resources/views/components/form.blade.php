<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
      <form action="{{ $action }}" method="{{ $method }}" class="space-y-6">
          @csrf
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              @foreach ($formInputs as $input)
                  <div class="{{ $input['gridClass'] ?? '' }}">
                      <label for="{{ $input['name'] }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          {{ $input['label'] }}
                      </label>
                      
                      @if($input['type'] === 'select')
                          <select name="{{ $input['name'] }}" id="{{ $input['name'] }}"
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              {{ $input['required'] ?? false ? 'required' : '' }}>
                              <option value="">{{ $input['placeholder'] ?? 'Select an option' }}</option>
                              @foreach($input['options'] as $value => $text)
                                  <option value="{{ $value }}">{{ $text }}</option>
                              @endforeach
                          </select>
                      
                      @elseif($input['type'] === 'textarea')
                          <textarea name="{{ $input['name'] }}" id="{{ $input['name'] }}" rows="{{ $input['rows'] ?? 4 }}"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="{{ $input['placeholder'] ?? '' }}"
                              {{ $input['required'] ?? false ? 'required' : '' }}></textarea>
                      
                      @else
                          <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" id="{{ $input['name'] }}"
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="{{ $input['placeholder'] ?? '' }}"
                              {{ $input['required'] ?? false ? 'required' : '' }}>
                      @endif
                  </div>
              @endforeach
          </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 shadow-md dark:shadow-white/10 hover:shadow-lg dark:hover:shadow-white/20 transition-shadow duration-300">
                {{ $submitText ?? 'Submit' }}
            </button>


      </form>
  </div>
</section>