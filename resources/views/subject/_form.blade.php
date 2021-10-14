<div class="">
    <label class="block text-sm text-gray-600" for="subjects">Subject</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="subjects" name="subjects" type="text" value={{ old('subjects') }}>
</div>
<p class="text-red-600">{{ $errors->first('subjects') }}</p>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
</div>
