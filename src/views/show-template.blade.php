<h1 style="text-align: center">Customize with bootstrap & your styles</h1>
<div class="email-create" style="padding-bottom: 50px;">
    <div class="container">
        <a href="{{route('memail.email-template.index')}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">All Template</a>
        <a href="{{ route('memail.email-template.edit',$template->id) }}" class="btn btn-primary">Update</a>
        <a class="btn btn-danger" title="delete" href="" onclick="if (confirm('Are You Sure To Delete This?')){event.preventDefault();document.getElementById('delete-form{{ $template->id }}').submit();} else {event.preventDefault();}">Delete</a>
        <form id="delete-form{{ $template->id }}" method="post" action="{{ route('memail.email-template.destroy',$template->id) }}" style="display: none;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
        <div class="email-form">
            <table id="w0" class="table table-striped table-bordered detail-view">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $template->name }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{ $template->subject }}</td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td>
                        <iframe src="{{ route('memail.email-template.raw',$template->id) }}" frameborder="0" width="100%" height="320px;"></iframe>
                    </td>
                </tr>
                <tr>
                    <th>Macros</th>
                    <td>{{ $template->macros }}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{ date('d M, Y H:i:j a', strtotime($template->created_at)) }}</td>
                </tr>
                <tr>
                    <th>Last Updated</th>
                    <td>{{ date('d M, Y H:i:j a', strtotime($template->updated_at)) }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
