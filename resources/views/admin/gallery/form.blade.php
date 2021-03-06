<div class="form-group {{ $errors->has('category_undertitle') ? 'has-error' : ''}}">
    <label for="category_undertitle" class="control-label">{{ 'Category Undertitle' }}</label>
    <input class="form-control" name="category_undertitle" type="text" id="category_undertitle" value="{{ isset($gallery->category_undertitle) ? $gallery->category_undertitle : ''}}" >
    {!! $errors->first('category_undertitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_title') ? 'has-error' : ''}}">
    <label for="category_title" class="control-label">{{ 'Category Title' }}</label>
    <input class="form-control" name="category_title" type="text" id="category_title" value="{{ isset($gallery->category_title) ? $gallery->category_title : ''}}" >
    {!! $errors->first('category_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
    <label for="images" class="control-label">{{ 'Images' }}</label>
    <textarea class="form-control" rows="5" name="images" type="textarea" id="images" >{{ isset($gallery->images) ? $gallery->images : ''}}</textarea>
    {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
