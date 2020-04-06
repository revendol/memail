<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<div class="email-template-list">
    <div class="container">
        <div class="email-list-header">
            <a href="{{ route('memail.email-template.create') }}"><button type="button" class="btn btn-primary installer-bb-30">Create Template</button></a>
            <a href="{{route('memail.email-campaign.index')}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">Campaign</a>
        </div>

        <div class="email-template-index">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Target Email</th>
                    <th>Notification Type</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($templates as $template)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $template->name }}</td>
                        <td>{{ $template->subject }}</td>
                        <td>{{ $template->target_email }}</td>
                        <td>{{ $template->notification_type }}</td>
                        <td>
                            <a href="{{ route('memail.email-template.show',$template->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('memail.email-template.edit',$template->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a class="btn btn-outline-danger btn-sm" title="delete" href="" onclick="if (confirm('Are You Sure To Delete This?')){event.preventDefault();document.getElementById('delete-form{{ $template->id }}').submit();} else {event.preventDefault();}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <form id="delete-form{{ $template->id }}" method="post" action="{{ route('memail.email-template.destroy',$template->id) }}" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $templates->links() }}
        </div>
    </div>
</div>
