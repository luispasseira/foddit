@csrf
<div class="form-group">
    <label for="name">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $post->title }}">
</div>

<div class="form-group">
    <label>Theme</label>
    <div class="form-group">
        <div class="d-flex">
            <select id="select_themes" class="form-control col-5" name="theme_id">
                <option disabled selected value=''>- - Select theme - -</option>
                @foreach($themes as $theme)
                    <option name="" value={{$theme->id}}>
                        {{ $theme->name }}
                    </option>
                @endforeach
            </select>
            <a class="col-1"></a>
            <input id="input_theme" type="text" name="theme_name" class="form-control col-6" placeholder="New theme" value="">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Body</label>
    <textarea type="text" name="body" rows="15" cols="50" class="form-control"
              placeholder="Be creative :)">{{ $post->body }}</textarea>
</div>
