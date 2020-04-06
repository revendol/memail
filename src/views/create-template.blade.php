<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<div class="container" >
    <div class="row">
        <div class="col-12">
            <a href="{{route('memail.email-template.index')}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">All Template</a>
        </div>
        <div class="col-12">
            <h3>Create Template</h3>
            <form role="form" action="{{ route('memail.email-template.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" id="subject" aria-describedby="name" placeholder="Enter Subject">
                </div>
                <div class="form-group">
                    <label for="contents">Content</label>
                    <textarea name="contents" id="contents" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="macros">Macros</label>
                    <textarea name="macros" id="macros" cols="30" rows="3" class="form-control"></textarea>
                    <p class="help-block">example1, example2</p>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/memail/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/memail/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace('editor1');
        CKEDITOR.replace('contents');
    })
</script>
