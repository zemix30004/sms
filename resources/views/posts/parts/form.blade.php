<div class="form-group">
    <input type="text" class="form-control" name="title" id="" required value="{{old('title') ?? $post->title ?? ''}}">
</div>
<div class="form-group">
    <textarea name="description" id="" rows="10" class="form-control" required>{{old('description') ?? $post->description ?? '' }}</textarea>
</div>
<div class="form-group">
    <input type="file" name="image" id="">
</div>
