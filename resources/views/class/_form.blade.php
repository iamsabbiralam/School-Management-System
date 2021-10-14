<div class="">
    <label class="block text-sm text-gray-600" for="name">Class</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" value={{ old('name') }}>
</div>
<p class="text-red-600">{{ $errors->first('name') }}</p>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
</div>
