<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<div class="email-create">
    <div class="container">
        <div class="email-form">
            <a href="{{route('memail.email-campaign.index')}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">All Campaign</a>
            <a class="btn btn-danger" title="delete" href="" onclick="if (confirm('Are You Sure To Delete This?')){event.preventDefault();document.getElementById('delete-form{{ $campaign->id }}').submit();} else {event.preventDefault();}">Delete</a>
            <form id="delete-form{{ $campaign->id }}" method="post" action="{{ route('memail.email-campaign.destroy',$campaign->id) }}" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form action="{{ route('memail.email-campaign.update',$campaign->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" disabled value="{{$campaign->title}}" class="form-control" id="exampleInputEmail1" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Template</label>
                    <select class="form-control" name="template_id">
                        @foreach($templates as $template)
                            <option value="{{ $template->id }}" @if($template->id==$campaign->template_id) selected @endif>{{ $template->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default mt-30">Submit</button>
            </form>
        </div>
    </div>
</div>
