{!! csrf_field() !!}

<div class="form-line">
	<label class="form-label" for="title">Title:</label>
	<input class="form-text-input" id="title" name="title" value="{{ old('title', $post->title) }}">
	@if($errors->has('title'))
		<div class="validation-error">{{ $errors->first('title') }}</div>
	@endif
</div>

<div class="form-line">
	<label class="form-label" for="text">Text:</label>
	<textarea class="markdown-editor" rows="15" id="text" name="text">{{ old('text', $post->markdown) }}</textarea>
	@if($errors->has('text'))
		<div class="validation-error">{{ $errors->first('text') }}</div>
	@endif
</div>

<div class="form-line">
	<label class="form-label" for="tags">Tags:</label>
	<input class="form-text-input" id="tags" name="tags_text" value="{{ old('tags_text', $post->tags_text) }}">
	@if($errors->has('tags_text'))
		<div class="validation-error">{{ $errors->first('tags_text') }}</div>
	@endif
</div>

<div class="form-line form-checkbox">
	<input class="mr-2" name="published" value="1" type="checkbox" {{ $post->published ? 'checked' : '' }}> Published
</div>

<div class="form-line form-checkbox">
	<input class="mr-2" name="original_content" value="1" type="checkbox" {{ $post->original_content ? 'checked' : '' }}> Original content
</div>

<div class="form-line">
	<button type="submit" class="btn btn-blue">{{ $submitText }}</button>
</div>
