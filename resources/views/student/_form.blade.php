<div class="">
    <label class="block text-sm text-gray-600" for="name">Student Name</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" value={{ old('name') }}>
</div>
<p class="text-red-600">{{ $errors->first('name') }}</p>
<div class="">
    <label class="block text-sm text-gray-600" for="email">Student Email</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" value={{ old('email') }}>
</div>
<p class="text-red-600">{{ $errors->first('email') }}</p>
<div class="">
    <label class="block text-sm text-gray-600" for="class_id">Student's Class</label>
    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="class_id" id="class_id">
        <option value="">Select Class</option>
        @foreach ($classes as $id => $value)
            <option value="{{ $id }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
<p class="text-red-600">{{ $errors->first('email') }}</p>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
</div>
