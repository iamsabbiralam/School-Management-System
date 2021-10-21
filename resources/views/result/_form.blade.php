<div class="">
    <label class="block text-sm text-gray-600" for="student_id">Class</label>
    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="id" id="id">
        <option value="">Select Class</option>
        @foreach ($classes as $id => $value)
            <option value="{{ $id }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
<p class="text-red-600">{{ $errors->first('id') }}</p>
<br>
<div class="">
    <label class="block text-sm text-gray-600" for="student_id">Student Name</label>
    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="class_id" id="class_id">
        <option value="">Select Students</option>
    </select>
</div>
<p class="text-red-600">{{ $errors->first('id') }}</p>
<br>
<div class="flex flex-wrap -mx-3 mb-6">
    @foreach ($results as $id => $value)
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="subject_id" type="text">{{ $value }}</label>
      <input name="subject_id[]" type="hidden" value="{{ $id }}">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="marks" name="marks[]" type="number" placeholder="Enter Marks">
    </div>
    @endforeach
</div>
<p class="text-red-600">{{ $errors->first('subject_id') }}</p>
<p class="text-red-600">{{ $errors->first('marks.*') }}</p>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('select[name="id"]').on('change', function() {
        var classID = jQuery(this).val();
        if (classID) {
            jQuery.ajax({
                url: '/getclassid/' + classID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="class_id"]').empty();
                    jQuery('select[name="class_id"]').append(
                        '<option>Select Students</option>');
                    jQuery.each(data, function(key, value) {
                        $('select[name="class_id"]').append('<option value="' + key +
                            '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="class_id"]').empty();
            $('select[name="class_id"]').append('<option>No Students Found</option>');
        }
    });
});
</script>
