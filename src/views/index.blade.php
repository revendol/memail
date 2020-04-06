<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<div class="email-sms-list">
    <div class="container">
        <div class="email-list-header">
            <a href="{{ route('memail.email-campaign.create') }}"><button type="button" class="btn btn-primary installer-bb-30">Create Campaign</button></a>
            <a href="{{ route('memail.email-template.index') }}"><button type="button" class="btn btn-success installer-bb-30">Templates</button></a>
        </div>

        <div class="email-summary">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Template</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{!! $campaign->template?$campaign->template->name:'<span style="color: orangered;">No template found</span>' !!}</td>
                        <td>
                            <a href="{{ route('memail.email-campaign.show',$campaign->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('memail.email-campaign.edit',$campaign->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a class="btn btn-danger btn-sm" title="delete" href="" onclick="if (confirm('Are You Sure To Delete This?')){event.preventDefault();document.getElementById('delete-form{{ $campaign->id }}').submit();} else {event.preventDefault();}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <form id="delete-form{{ $campaign->id }}" method="post" action="{{ route('memail.email-campaign.destroy',$campaign->id) }}" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
