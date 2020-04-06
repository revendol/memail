<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<div class="email-create">
    <div class="container">
        <div class="email-form">
            <a href="{{route('memail.email-template.index')}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">All Template</a>
            <a class="btn btn-danger" title="delete" href="" onclick="if (confirm('Are You Sure To Delete This?')){event.preventDefault();document.getElementById('delete-form{{ $template->id }}').submit();} else {event.preventDefault();}">Delete</a>
            <form id="delete-form{{ $template->id }}" method="post" action="{{ route('memail.email-template.destroy',$template->id) }}" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form method="POST" action="{{ route('memail.email-template.update',$template->id) }}" id="news_add" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" class="form-control capital" placeholder="Enter Name Here..." value="{{!empty(old('name')) ? old('name') : $template->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <input type="text" name="subject" class="form-control capital" placeholder="Enter Subject Here..." value="{{!empty(old('subject')) ? old('subject') : $template->subject}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Content</label>
                        <div class="row">
                            <div class="col-12">
                                <textarea id="contents" name="contents" class="form-control" rows="10">{{!empty(old('contents')) ? old('contents') : $template->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Macros</label>
                        <textarea id="macros" name="macros" class="form-control" rows="3">{{!empty(old('macros')) ? old('macros') : $template->macros }}</textarea>
                        <p class="help-block">example1, example2</p>
                    </div>
                    <button type="submit" class="btn green">Update</button>
                </div>
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
