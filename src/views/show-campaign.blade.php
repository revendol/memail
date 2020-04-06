<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<div class="email-create">
    <div class="container">
        <a href="{{route('memail.email-campaign.index')}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">All Campaign</a>
        <a href="{{ route('memail.email-campaign.edit',$campaign->id) }}" class="btn btn-primary">Update</a>
        <a class="btn btn-danger" title="delete" href="" onclick="if (confirm('Are You Sure To Delete This?')){event.preventDefault();document.getElementById('delete-form{{ $campaign->id }}').submit();} else {event.preventDefault();}">Delete</a>
        <form id="delete-form{{ $campaign->id }}" method="post" action="{{ route('memail.email-campaign.destroy',$campaign->id) }}" style="display: none;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
        <div class="email-form" style="margin-top: 15px;">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <strong>{{ $campaign->title }}</strong>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Template</label>
                <strong>{!! $campaign->template?$campaign->template->name:'<span style="color: orangered;">No template found</span>' !!}</strong>
            </div>
        </div>
    </div>
</div>
